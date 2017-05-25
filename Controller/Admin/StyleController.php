<?php

namespace Controller\Admin;
use Library\Controller;
use Library\Request;
use Library\Pagination\Pagination;
use Model\Entity\Style;

class StyleController extends Controller
{
	private $stylesForView = [];

 	public function indexAction(Request $request)
    {   

        $repository = $this->get('repository')->getRepository('Book'); // \Model\BookRepository
        $styles = $repository->findStyles();
        $data = [
			'styles' => $styles
        ];

        return $this->render('styles.phtml', $data);      
 
    }

    public function editAction(Request $request)
    {
    	$repository = $this->get('repository')->getRepository('Book');
        $style = $request->get("style");
    	//in case style contains "-" symbol
        if( strpos($request->get("style"),"-") ) {
            $style = implode(" ",explode('-',$style));
        }

        $style = $repository->getStyleByTitle($style);
        
        $data = [
            'style' => (new Style())->setId($style['id'])->setTitle($style['title'])
        ];

        return $this->render('edit_style.phtml',$data);
    }

    public function updateAction(Request $request)
    {
        $repository = $this->get('repository')->getRepository('Book');
        $styleTitleId = $request->post("id");       
        $styleTitle = $request->post("title");

        if( $repository->updateStyleTitle($styleTitleId, $styleTitle) ) {
            $this->get('router')->redirect('/admin/styles');
        } else {
            $data = [
                'style' => (new Style())->setId($styleTitleId)->setTitle($styleTitle)
            ];
            return $this->render('edit_style.phtml',$data);
        }
    }
}