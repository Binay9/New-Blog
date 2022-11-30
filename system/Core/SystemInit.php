<?php

namespace System\Core;

abstract class SystemInit
{

    public function __construct()
    {
        date_default_timezone_set(config('timezone'));
    }

    public function start()
    {
        $parts = $this->getUrlParts();
    }

    private function getUrlParts()
    {
        dump($_SERVER);
    }
}
