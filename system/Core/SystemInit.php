<?php

namespace System\Core;

use System\Exceptions\NotAControllerException;

class SystemInit
{

    public function __construct()
    {
        session_start();
        date_default_timezone_set(config('timezone'));
    }

    public function start()
    {
        $parts = $this->getUrlParts();

        $this->loadController($parts);
    }

    private function getUrlParts()
    {
        $parts = [];
        $return = [];

        if (isset($_SERVER['PATH_INFO'])) {
            $parts = explode('/', $_SERVER['PATH_INFO']);
        }

        if (!empty($parts)) {
            $return['controller'] = ucfirst($parts[1]) . 'Controller';
        } else {
            $return['controller'] = ucfirst(config('default_controller')) . 'Controller';
        }

        if (!empty($parts) && isset($parts[2]) && !empty($parts[2])) {
            $return['method'] = $parts[2];
        } else {
            $return['method'] = 'index';
        }

        if (!empty($parts) && isset($parts[3]) && !empty($parts[3])) {
            $return['argument'] = $parts[3];
        } else {
            $return['argument'] = null;
        }

        return $return;
    }

    private function loadController($parts)
    {
        $class = "App\Controllers\\" . $parts['controller'];
        $obj = new $class;

        if ($obj instanceof BaseController) {

            if (!is_null($parts['argument'])) {
                $obj->{$parts['method']}($parts['argument']);
            } else {
                $obj->{$parts['method']}();
            }
        } else {
            throw new NotAControllerException("Class '{$class}' is not an instance of Base Controller!");
        }
    }
}
