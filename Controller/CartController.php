<?php

namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Session;
use Library\Router;
use Library\Cookie;

class CartController extends Controller
{
    public function indexAction()
    {
    	$cartCookie = Cookie::get('cart');
    
    	if (empty(unserialize($cartCookie))) {
    		$cart = [];
    	} else {
    		$cart = unserialize($cartCookie);
    	}
    	//reindex array using array_values
    	$ids = array_values(array_unique($cart));
    	//remove repeated values uses array_count_values
    	//array_count_values - returns an array using the values of array as keys and their frequency in array as values
    	$cartAmounts = array_count_values($cart);
    	$cart = $this->get('repository')->getRepository('Book')->findByIds($ids);

        return $this->render('index.phtml', ['cart' => $cart, 'cartAmounts' => $cartAmounts ]);
    }

    public function addAction(Request $request) 
    {	
    	$id = $request->get('id');
    	$cartCookie = Cookie::get('cart');
    	if (empty(unserialize($cartCookie))) {
    		$cart = [];
    	} else {
    		$cart = unserialize($cartCookie);
    	}

    	$cart[] = $id;
    	$cartCookie = serialize($cart);
    	Cookie::set('cart', $cartCookie);

    	return $this->get('router')->redirect('/book_list');
    }
}