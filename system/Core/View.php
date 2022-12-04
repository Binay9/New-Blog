<?php

namespace System\Core;

class View
{
    public static function load($view, $data = [])
    {
        $path = BASEDIR . '/views/';
        $filename = $path . $view;

        extract($data);

        require $filename;
    }
}
