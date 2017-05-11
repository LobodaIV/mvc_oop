<?php

namespace Controller;

use Library\Controller;
use Model\Form\FeedbackForm;
use Model\FeedbackRepository;
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
               
                $model = new FeedbackRepository();
                $model->save([
                    'author' => $form->author,
                    'email' => $form->email,
                    'message' => $form->message,
                ]);
                Session::setFlash('Feedback sent');
                Router::redirect('/index.php?route=default/feedback');
            }
        }

        return $this->render('feedback.phtml',['form' => $form]);
    }
}