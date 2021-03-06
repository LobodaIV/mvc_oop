<?php 
namespace Library;

abstract class Controller
{

	protected $container;

	private static $layout = 'layout.phtml';

	public static function setAdminLayout()
	{
		self::$layout = 'admin_layout.phtml';
	}

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
		//$dir = str_replace(['\\', 'Controller'], '', get_called_class());
		$dir = trim(str_replace(['\\', 'Controller'], [DS,''], get_called_class()), '/');
		$file = VIEW_DIR . $dir . DS . $view;
		if ( !file_exists($file) ) {
    	//	throw new \Exception("{$file} not found");
    	echo $file;
    	dump($file);
			
    	}
    	
        ob_start();
        require $file;
        $content = ob_get_clean();
	
        ob_start();
        require VIEW_DIR . self::$layout;
        return ob_get_clean();

	}
}