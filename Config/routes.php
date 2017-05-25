<?php

//todo in xml

use Library\Route;
/*
return  array(
    // site routes
    'default' => new Route('/', 'Default', 'index'),
    'index' => new Route('/index.php', 'Default', 'index'),
    'books_list' => new Route('/books', 'Book', 'index'),
    'books_page' => new Route('/book-{id}\.html', 'Book', 'show', array('id' => '[0-9]+') ),
    'feedback_page' => new Route('/feedback', 'Default', 'feedback'),
    'login' => new Route('/login', 'Security', 'login'),
    'logout' => new Route('/logout', 'Security', 'logout'),
    
    
    'admin_default' => new Route('/admin', 'Admin\\Default', 'index'),
    'admin_books_list' => new Route('/admin/books', 'Admin\\Book', 'index'),  
);*/
/*

$this->route = $route;
$this->pattern = $pattern;
$this->controller = $controller;
$this->action = $action;
$this->params = $params;

*/

return array(
    /* Web routes */
    new Route('default','/','Default','index'),
    new Route('index', '/index.php', 'Default', 'index'),
    new Route('book_list', '/books', 'Book', 'index'),
    new Route('book_page', '/book-{id}\.html', 'Book', 'show', array('id' => '[0-9]+') ),
    new Route('feedback_page', '/feedback', 'Default', 'feedback'),
    new Route('login', '/login', 'Security', 'login'),
    new Route('logout', '/logout', 'Security', 'logout'),

    /* Admin Routes */
    new Route('admin_default', '/admin', 'Admin\\Default', 'index'),
    new Route('admin_book_list', '/admin/books', 'Admin\\Book', 'index')
);
