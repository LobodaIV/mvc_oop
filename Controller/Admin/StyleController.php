<?php

namespace Controller\Admin;
use Library\Controller;
use Library\Request;
use Library\Pagination\Pagination;

class StyleController extends Controller
{
	private $stylesForView = [];

 	public function indexAction(Request $request)
    {   

        $repository = $this->get('repository')->getRepository('Book'); // \Model\BookRepository
        $styles = $repository->findStyles();
        //foreach ($styles as $style) {
        	//$style->setTitle(strtolower(str_replace(" ","-",$style->getTitle())));
        //}

        $data = [
			'styles' => $styles
        ];

        return $this->render('styles.phtml', $data);      
 
    }

    public function editAction(Request $request)
    {
    	$repository->get('repository')->getRepository('Book');
    	$styleName = $request->get('style');
    }
}