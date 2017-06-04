<?php

namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Session;
use Library\Router;

class CartController extends Controller
{
    public function indexAction()
    {
    	$cartCookie = $_COOKIE['cart'];
    	
        return $this->render('index.phtml');
    }
}