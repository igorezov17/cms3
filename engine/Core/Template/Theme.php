<?php

namespace Engine\Core\Template;

class Theme
{

    const RULES_NAME_FILE = [
        'header'  => 'header-%s',
        'footer'  => 'footer-%s',
        'sidebar' => 'sidebar-%s'
    ];

    public $url = '';

    protected $data = [];

    public function header($name = null, $data = [])
    {
        $name = (string)$name;
        $file = 'header';

        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        } 

        $this->loadTemplateFile($file);
    }

    public function footer($name = null, $data = [])
    {
        $name = (string)$name;
        $file = 'footer';

        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        } 

        $this->loadTemplateFile($file);
    }

    public function sidebar($name = null, $data = [])
    {
        $name = (string)$name;
        $file = 'sidebar';

        if ($name !== '') {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        } 

        $this->loadTemplateFile($file);
    }

    public function block($name = null, $data = [])
    {
        $name = (string)$name;
        if ($name !== '') {
            $this->loadTemplateFile($name, $data);
        } 
    }

    private function loadTemplateFile($nameFile, $data = [])
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';

        if (is_file($templateFile)) {
            extract($data);
            require_once $templateFile;
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }

    public function getData($key)
    {
        return $this->data[$key];
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}

