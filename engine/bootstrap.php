<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\DI\DI;
use Engine\Cms;

try {

    $di = new DI;

    $services = require __DIR__ . '/Config/Service.php';

    foreach($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new Cms($di);
    echo "<pre>";
    print_r($cms->run());
    echo "</pre>";

} catch (\Exception $e) {
    echo $e->getMessage();
}