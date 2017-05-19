<?php

namespace Controller\Admin;
use Library\Controller;
use Library\Request;
use Model\BookRepository;
use Model\Entity\Author;

class AuthorController extends Controller
{
 	public function indexAction(Request $request)
    {        
        $repository = $this->get('repository')->getRepository('Book'); // \Model\BookRepository
        $authors = $repository->findAuthors();

        $data = [
			'authors' => $authors
        ];

        return $this->render('authors.phtml', $data);      
 
    }
}