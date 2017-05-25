<?php

namespace Library;

class Route
{
    public $route;
    public $pattern;
    public $controller;
    public $action;
    public $params;
    
    public function __construct($route, $pattern, $controller, $action, array $params = array())
    {
        $this->route = $route;
        $this->pattern = $pattern;
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }
}