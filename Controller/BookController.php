<?php

namespace Controller;

use Library\Controller;
use Model\BookRepository;

class BookController extends Controller
{
    public function indexAction()
    {
        $model = new BookRepository();
        $books = $model->findAll();
        
        $author = 'King';
        
        $data = [
            'author' => $author, 
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