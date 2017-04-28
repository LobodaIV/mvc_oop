<?php

class BookController extends Controller
{
    public function indexAction()
    {
    	/*$dir = str_replace('Controller', '', __CLASS__);
    	$file = VIEW_DIR . $dir . DS . 'index.phtml';

    	if( !file_exists($file) )
    	{
    		throw new Exception("{$file} is not exist");
    	}

        ob_start();
        require $file;
        return ob_get_clean();
        */
        return static::render('index.phtml');
    }
    
    public function showAction()
    {
        
    }
    
    public function editAction()
    {
        
    }
}