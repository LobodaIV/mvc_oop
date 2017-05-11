<?php

namespace Library;

abstract class Session
{
	const FLASH_KEY = 'flash_message';

	public static function start()
	{
		session_start();
	}

	public static function destroy()
	{
		session_destroy();
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key, $default = null)
	{
		if (self::has($key)) {
			return $_SESSION[$key];
		}

		return $default;
	}

	public static function has($key)
	{
		return isset($_SESSION[$key]);
	}

	public static function remove($key)
	{
		if (self::has($key)) {
			unset($_SESSION[$key]);
		}
	}

	public static function setFlash($message)
	{
		self::set(self::FLASH_KEY, $message);
	}

	public static function getFlash()
	{
		$message = self::get(self::FLASH_KEY);
		self::remove(self::FLASH_KEY);
		return $message;
	}
}