<?php
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('VIEW_DIR', ROOT.'View' . DS);

spl_autoload_register(function($className) {
    
    $file = ROOT . str_replace('\\', DS, "{$className}.php");
    if( !file_exists($file) )
    {
    	require $file;
    }
	    
});

$request = new Request();
$route = $request->get('route', 'default/index'); // $_GET['route']

//todo: защита от дурака если нет слэш в значении

if( !preg_match("//", $route) ) 
{
	throw new Exception("Wrong format for controller");
}

$route = explode('/', $route);

$controller = ucfirst($route[0]) . 'Controller';
$action = $route[1] . 'Action';

$controller = new $controller();

if (!method_exists($controller, $action)) {
    throw new Exception("{$action} not found");
}

echo $controller->$action();


//var_dump($controller, $action);