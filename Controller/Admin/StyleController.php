<?php

namespace Controller\Admin;
use Library\Controller;
use Library\Request;
use Library\Pagination\Pagination;

class StyleController extends Controller
{
 	public function indexAction(Request $request)
    {        
        $repository = $this->get('repository')->getRepository('Book'); // \Model\BookRepository
        $styles = $repository->findStyles();

        $data = [
			'styles' => $styles
        ];

        return $this->render('styles.phtml', $data);      
 
    }
}