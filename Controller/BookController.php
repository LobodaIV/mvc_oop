<?php

namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Pagination\Pagination;
use Model\BookRepository;

class BookController extends Controller
{

    const BOOKS_PER_PAGE = 8;

    public function indexAction(Request $request)
    {
        $currentPage = $request->get('page', 1);
        $repository = $this->get('repository')->getRepository('Book'); // \Model\BookRepository
        $count = $repository->count();
        $books = $repository->findAllActive(($currentPage - 1) * self::BOOKS_PER_PAGE, self::BOOKS_PER_PAGE);
    
        $pagination = new Pagination([
            'itemsCount' => $count,
            'itemsPerPage' => self::BOOKS_PER_PAGE,
            'currentPage' => $currentPage
            ]);

        $data = [
            'pagination' => $pagination,
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