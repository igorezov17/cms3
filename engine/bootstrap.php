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

} catch (\Exception $e) {
    echo $e->getMessage();
}