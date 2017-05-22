<?php

namespace Controller;
use Library\Controller;
use Model\Form\FeedbackForm;
use Model\FeedbackRepository;
use Model\Entity\Feedback;
use Library\Request;
use Library\Session;

class ExceptionController extends Controller
{
    public function handleAction(Request $request, \Exception $exception)
    {
        return $this->render('handle.phtml', ['exception' => $exception]);
    }
}