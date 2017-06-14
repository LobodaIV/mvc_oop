<?php
namespace Controller;
use Library\Controller;
use Library\Request;
use Library\Password;
use Library\Session;
use Model\Form\LoginForm;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $form = new LoginForm($request);
        
        if ($request->isPost()) {
            
            if ($form->isValid()) {
                $repo = $this->get('repository')->getRepository('User');
                $password = new Password($form->password);
                
                $user = $repo->find($form->email, $password);
                
                if ($user) { // if user found
                
                    Session::set('user', $user->getEmail());
                    Session::setFlash('Logged in');
                    $this->get('router')->redirect('/admin');
                }
                
                Session::setFlash('User not found');
                $this->get('router')->redirect('/login');
            }
            
            Session::setFlash('Fill the fields');
        }
        
        return $this->render('login.phtml');
    }
    
    public function logoutAction()
    {
        Session::remove('user');
        $this->get('router')->redirect('/');
    }
    
    public function registerAction()
    {
        
    }
}