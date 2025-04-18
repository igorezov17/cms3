<?php

$this->router->add('login', '/admin/login', 'LoginController:form');
$this->router->add('dashboard', '/admin/dashboard', 'DashboardController:index');