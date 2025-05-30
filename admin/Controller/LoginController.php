<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;
use Engine\Core\Database\QueryBuilder;


class LoginController extends Controller
{

    protected $auth;

    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() !== null) {
            header('Location: /admin/');
            exit;
        }
    }

    public function form()
    {
        $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;

        $queryBuild = new QueryBuilder();
        $sql = $queryBuild
                    ->select()
                    ->from('user')
                    ->where('email', $params['email'])
                    ->where('password', md5($params['password']))
                    ->limit(1)
                    ->sql();




        // $query = $this->db->query('
        //     SELECT *
        //     FROM `user`
        //     WHERE email="' . $params['email'] . '"
        //     AND password="' . md5($params['password']) . '"
        //     LIMIT 1
        // ');

        $query = $this->db->query($sql, $queryBuild->values);


        if (!empty($query)) {
            $user = $query[0];

            if ($user['role'] == 'admin') {

                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->auth->salt());

                // $this->db->execute('
                //     UPDATE `user`
                //     SET hash = "' . $hash . '"
                //     WHERE id = "' . $user['id'] . '"
                // ');

                $sqlUpdatehash = $queryBuild
                    ->update('user')
                    ->set(['hash' => $hash])
                    ->where('id', $user['id'])
                    ->sql();

                $this->db->execute($sqlUpdatehash, $queryBuild->values);


                $this->auth->authorize($hash);

                header('Location: /admin/login/');
                exit;
            }
        }
        echo "Incorrect email or password";
    }
}
