<?php 
namespace Library;

abstract class Controller
{

	public static function render($view)
	{
		$dir = str_replace(['\\', 'Controller'], '', get_called_class());
		$file = VIEW_DIR . $dir . DS . $view;
	
    	if( !file_exists($file) )
    	{
    		throw new \Exception("{$file} not found");
    	}

        ob_start();
        require_once $file;
        return ob_get_clean();
	
	}
}