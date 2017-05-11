<?php

namespace Library;

class Router
{
	public function redirect($to)
	{
		header("Location: {$to}");
		die();
	}
}