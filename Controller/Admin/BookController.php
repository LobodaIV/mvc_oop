<?php

namespace Controller;

use Library\Controller;
use Model\BookRepository;

class BookController extends Controller
{
    public function indexAction()
    {
        $model = $this->get('repository')->getRepository('Book'); // \Model\BookRepository
        $books = $model->findAll();
    
        $data = [
            'books' => $books
        ];
        
        return $this->render('index.phtml', $data);      
 
    }
    
    public function showAction()
    {
        
    }
    
    public function editAction()
    {
        
    }
}