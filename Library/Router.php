<?php

namespace Library;

abstract class Router
{
	public static function redirect($to)
	{
		header("Location: {$to}");
		die();
	}
}