<?php

define('BASEDIR', __DIR__);

require BASEDIR . "/vendor/autoload.php";


$app = new \System\Core\SystemInit;

$app->start();
