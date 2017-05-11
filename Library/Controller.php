<?php 
namespace Library;

abstract class Controller
{

	protected $container;

	public function setContainer(Container $container)
	{
		$this->container = $container;
		return $this;
	}

	public function get($key)
	{
		return $this->container->get($key);
	}

	public static function render($view, array $args = array())
	{
		extract($args);
		$dir = str_replace(['\\', 'Controller'], '', get_called_class());
		$file = VIEW_DIR . $dir . DS . $view;
	
    	if ( !file_exists($file) ) {
    		throw new \Exception("{$file} not found");
    	}
    	
        ob_start();
        require $file;
        $content = ob_get_clean();
	
        ob_start();
        require VIEW_DIR . 'layout.phtml';
        return ob_get_clean();

	}
}