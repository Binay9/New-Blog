<?php

namespace System\Core;

use System\Exceptions\NotAControllerException;

class SystemInit
{

    public function __construct()
    {
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

        if (!empty($parts) && isset($parts[1])) {
            $return['controller'] = ucfirst($parts[1]) . 'Controller';
        } else {
            $return['controller'] = ucfirst(config('default_controller')) . 'Controller';
        }

        if (!empty($parts[2]) && isset($parts[2])) {
            $return['method'] = $parts[2];
        } else {
            $return['method'] = 'index';
        }

        if (!empty($parts[3]) && isset($parts[3])) {
            $return['argument'] = $parts[3];
        } else {
            $return['argument'] = null;
        }

        return $return;
    }

    private function loadController($parts)
    {
        // dd($parts);
        $class = 'App\Controllers\\' . $parts['controller'];
        $obj = new $class;

        dd($class, $obj);

        if ($obj instanceof BaseController) {
        } else {
            throw new NotAControllerException("Class '{$class}' is not an instance of Base Controller class!");
        }
    }
}
