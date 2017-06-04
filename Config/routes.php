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
    new Route('cart', '/cart', 'Cart', 'index'),

    /* Admin Routes */
    new Route('admin_default', '/admin', 'Admin\\Default', 'index'),
    new Route('admin_manage_books', '/admin/books_management', 'Admin\\Book', 'index'),
    new Route('admin_manage_authors','/admin/authors_management','Admin\\Author','index'),
    new Route('admin_manage_styles','/admin/styles','Admin\\Style','index'),
    new Route('admin_manage_style','/admin/styles/edit/{style}\.html','Admin\\Style','edit',array('style' => '[a-z]+-?[a-z]+')),
    new Route('admin_update_style','/admin/styles/update/{style}\.html','Admin\\Style','update',array('style'=>'[a-z]+-?[a-z]+'))

);
