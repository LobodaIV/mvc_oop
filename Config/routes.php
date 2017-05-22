<?php

//todo in xml

use Library\Route;

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
);