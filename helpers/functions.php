<?php
if (!function_exists('config')) {
    function config($key)
    {
        require "config/settings.php";

        if (key_exists($key, $config)) {
            return $config[$key];
        } else {
            return false;
        }
    }
}
