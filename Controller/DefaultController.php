<?php

namespace Controller;

use Library\Controller;
use Model\Form\FeedbackForm;
use Model\FeedbackModel;
use Library\Request;

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
                $model = new FeedbackModel();
                $model->save([
                    'author' => $form->author,
                    'email' => $form->email,
                    'message' => $form->message,
                ]);
            }
        }
        
        return $this->render('feedback.phtml');
    }
}