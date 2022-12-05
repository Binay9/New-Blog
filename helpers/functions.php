<?php

if (!function_exists('config')) {
    function config($key)
    {
        require BASEDIR . "/config/settings.php";

        if (key_exists($key, $config)) {
            return $config[$key];
        } else {
            return false;
        }
    }
}

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        \System\Core\View::load($view, $data);
    }
}

if (!function_exists('url')) {
    function url($uri = '')
    {
        return config('site_url') . $uri;
    }
}

if (!function_exists('redirect')) {
    function redirect($url)
    {
        header('location: ' . $url);
        die;
    }
}

if (!function_exists('logged_in')) {
    function logged_in()
    {
        return isset($_SESSION['user']) && !empty($_SESSION['user']);
    }
}

if (!function_exists('user')) {
    function user()
    {
        $user = new \App\Models\Admin;
        $user->load($_SESSION['user']);
        return $user;
    }
}

if (!function_exists('set_message')) {
    function set_message($message, $type = 'success')
    {
        $_SESSION['message'] = [
            'content' => $message,
            'type' => $type
        ];
    }
}

if (!function_exists('get_message')) {
    function get_message()
    {
        return $_SESSION['message'];
    }
}

if (!function_exists('check_message')) {
    function check_message()
    {
        return isset($_SESSION['message']) && !empty($_SESSION['message']);
    }
}

if (!function_exists('clear_message')) {
    function clear_message()
    {
        unset($_SESSION['message']);
    }
}
