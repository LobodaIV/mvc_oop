<?php
namespace Controller\Admin;
use Library\Controller;
use Model\Form\FeedbackForm;
use Model\FeedbackRepository;
use Model\Entity\Feedback;
use Library\Request;
use Library\Session;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('index.phtml');
    }
}