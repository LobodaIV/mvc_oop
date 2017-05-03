<?php

error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('VIEW_DIR', ROOT.'View' . DS);

spl_autoload_register( function($className) {
    
    $file = ROOT . str_replace('\\', DS, "{$className}.php");
    //echo $file;
    if( !file_exists($file) )
    {
    	throw new \Exception("File not found");
    }

    require_once $file;
	    
});

$request = new Library\Request();
$route = $request->get('route', 'default/index'); // $_GET['route']

//todo: защита от дурака если нет слэш в значении

if( !preg_match("//", $route) ) 
{
	throw new \Exception("Wrong format for controller");
}

$route = explode('/', $route);

$controller = 'Controller' . DS . ucfirst($route[0]) . 'Controller';
$action = $route[1] . 'Action';

$controller = new $controller();//ControllerDefaultController

if (!method_exists($controller, $action)) {
    throw new \Exception("{$action} not found");
}

echo $controller->$action($request);

require VIEW_DIR . 'layout.phtml';
