<?php

namespace Library;

abstract class Router
{
	public function redirect($to)
	{
		header("Location: {$to}");
		die();
	}
}