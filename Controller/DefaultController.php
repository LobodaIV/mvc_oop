<?php

namespace Controller;
use Library\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return 'wlcome text';
    }
    
    public function aboutAction()
    {
        return 'contact form';
    }
}