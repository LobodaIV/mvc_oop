<?php

namespace Controller;

use Library\Controller;
use Model\Form\FeedbackForm;
use Model\FeedbackRepository;
use Model\Entity\Feedback;
use Library\Request;
use Library\Session;
use Library\Router;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('index.phtml');
    }
    
    public function feedbackAction(Request $request)
    {
        $form = new FeedbackForm($request);
        
        if ($request->isPost()) {
            if ($form->isValid()) {
                $model = $this->get('repository')->getRepository('Feedback');
                $model->save(new Feedback($form->author,$form->email,$form->message));
                Session::setFlash('Feedback sent');
                $this->get('router')->redirect('/index.php?route=default/feedback');
            }

            Session::setFlash('Fill the fields properly');
        }

        return $this->render('feedback.phtml',['form' => $form]);
    }
}