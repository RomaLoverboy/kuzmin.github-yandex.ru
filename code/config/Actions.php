<?php


namespace config;


class Actions
{
    public $route;

    public function __construct($route)
    {
        $this->route = str_replace('action', '', $route);
        $this->route = strtolower($this->route);
    }

}