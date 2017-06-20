<?php

namespace Controller\Admin;
use Library\Controller;
use Library\Request;
use Model\AuthorRepository;
use Model\Entity\Author;

class AuthorController extends Controller
{
 	public function indexAction(Request $request)
    {        
        $repository = $this->get('repository')->getRepository('Author'); // \Model\BookRepository
        $authors = $repository->findAuthors();

        $data = [
			'authors' => $authors
        ];

        return $this->render('authors.phtml', $data);      
 
    }

    public function showAction(Request $request)
    {
        $repository = $this->get('repository')->getRepository('Author');
        $authorId = $this->getAuthorIdFromUrl($request->get('author_name_id'));

        $author = $repository->findAuthorById($authorId);
        
        $data = [
            'author' => (new Author())->setId($author['id'])->setName($author['name'])->setDescr($author['descr'])
        ];

        return $this->render('author_page.phtml',$data);

    }

    public function editAction(Request $request)
    {
    	$repository = $this->get('repository')->getRepository('Author');
        $authorId = $request->get('author_name_id');
    	//in case author contains "-" symbol get symbola which is number by default
        if ( strpos($request->get("author_name_id"),"-") ) {
            //preg_match("/\d+/", $authorId, $matches);
            //$authorId = intval($matches[0]);
            $authorId = $this->getAuthorIdFromUrl($authorId);
        }
        
        $author = $repository->findAuthorById($authorId);
        
        $data = [
            'author' => (new Author())->setId($author['id'])->setName($author['name'])->setDescr($author['descr'])
        ];

        return $this->render('edit_author.phtml',$data);
    }

    public function updateAuthorNameAction(Request $request)
    {   
        $repository = $this->get('repository')->getRepository('Author');
        $authorId = $request->post('id');
        $authorName = preg_replace('/\d+/', "", strval($request->post('author_name') ));
        if( $repository->updateAuthorName($authorId, $authorName) ) {
            $this->get('router')->redirect('/admin/authors');
        } else {
            $data = [
                'author' => (new Author())->setId($authorId)->setName($authorName)
            ];
            return $this->render('edit_author.phtml',$data);
        }
    }

    public function deleteAuthorAction(Request $request)
    {
        $repository = $this->get('repository')->getRepository('Author');
        $authorId = $this->getAuthorIdFromUrl($request->get('author_name_id'));
        if ( $repository->deleteAuthor($authorId) ) {
            $this->get('router')->redirect('/admin/authors');
        }

        return false;
    }

    public function newAuthorAction(Request $request)
    {
        $repository = $this->get('repository')->getRepository('Author');
        $authorName = $request->post('author_name');
        $authorDescription = $request->post('descr');

        if( $repository->addAuthor($authorName, $authorDescription) ) {
            $this->get('router')->redirect('/admin/authors');
        }
    }

    public function getAuthorIdFromUrl($str)
    {
        preg_match("/\d+/", $str, $matches);
        return $str = intval($matches[0]);
    }
}