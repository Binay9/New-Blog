<?php

namespace System\Core;

abstract class BaseController
{
    abstract public function index();

    protected function checkLogin()
    {
        if (!logged_in()) {
            redirect(url('login'));
        }
    }

    protected function checkAdmin()
    {
        if (user()->type != 'admin') {
            set_message('Access denied', 'danger');
            redirect(url('home'));
        }
    }
}
