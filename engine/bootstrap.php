<?php

use Engine\DI\DI;
use Engine\Cms;

try {

    $di = new DI;

    $cms = new Cms($di);
    $cms->run();

} catch (\Exception $e) {
    echo $e->getMessage();
}