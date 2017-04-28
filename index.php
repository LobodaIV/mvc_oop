<?php
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('VIEW_DIR', ROOT.'View' . DS);

spl_autoload_register(function($className) {
    
    $file = "{$className}.php";
    
    if (file_exists("Library/$file")) {
        require_once "Library/$file";
    } elseif (file_exists("Controller/$file")) {
        require_once "Controller/$file";
    } else {
        throw new Exception("{$file} not found");
    }
    
    
});

$request = new Request();
$route = $request->get('route', 'default/index'); // $_GET['route']

//todo: защита от дурака если нет слэш в значении

$route = explode('/', $route);

$controller = ucfirst($route[0]) . 'Controller';
$action = $route[1] . 'Action';

$controller = new $controller();

if (!method_exists($controller, $action)) {
    throw new Exception("{$action} not found");
}

echo $controller->$action();


//var_dump($controller, $action);