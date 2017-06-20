<?php

//todo in xml

use Library\Route;
//$route, $pattern, $controller, $action, array $params = array()
return array(
    /* Web routes */
    new Route('default','/','Default','index'),
    new Route('index', '/index.php', 'Default', 'index'),
    new Route('books', '/book_list', 'Book', 'index'),
    new Route('books_pagination', '/book_list-{page}', 'Book', 'index', array('page' => '[0-9]+') ),
    new Route('book_page', '/book-{id}\.html', 'Book', 'show', array('id' => '[0-9]+') ),
    new Route('feedback_page', '/feedback', 'Default', 'feedback'),
    new Route('login', '/login', 'Security', 'login'),
    new Route('logout', '/logout', 'Security', 'logout'),
    /* Admin Routes */
    new Route('admin_default', '/admin', 'Admin\\Default', 'index'),
    new Route('admin_manage_books', '/admin/books_management', 'Admin\\Book', 'index'),
    /* manage authors */
    new Route('admin_manage_authors','/admin/authors','Admin\\Author','index'),
    new Route('admin_manage_authors','/admin/authors/show/{author_name_id}\.html','Admin\\Author','show', array('author_name_id' => '[a-z-+]*[0-9]+' )),
    new Route('admin_manage_author','/admin/authors/edit/{author_name_id}\.html','Admin\\Author','edit', array('author_name_id' => '[a-z-+]*[0-9]+' )),
    new Route('admin_update_author', '/admin/authors/update/{author}.html','Admin\Author','updateAuthorName', array('author' => '[a-z-+]*[0-9]+' )),
    new Route('admin_delete_author', '/admin/authors/delete/{author_name_id}\.html', 'Admin\Author',
    'deleteAuthor', array('author_name_id' => '[a-z-+]*[0-9]+' )),
    new Route('admin_add_author','/admin/authors/add','Admin\Author','newAuthor'),
    /* manage styles */
    new Route('admin_manage_styles','/admin/styles','Admin\\Style','index'),
    new Route('admin_manage_style','/admin/styles/edit/{style}\.html','Admin\\Style','edit',array('style' => '[a-z]+-?[a-z]+')),
    new Route('admin_update_style','/admin/styles/update/{style}\.html','Admin\\Style','update',array('style'=>'[a-z]+-?[a-z]+'))

);
