<?php

$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('auth-admin', '/admin/login/', 'LoginController:authAdmin', 'POST');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');