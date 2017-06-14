<?php
namespace Model\Form;
use Library\Request;
class LoginForm
{
    public $email;
    public $password;
    
    public function __construct(Request $request)
    {
        $this->email = $request->post('email');
        $this->password = $request->post('password');
    }
    
    public function isValid()
    {
        // TODO: create
        return true;
    }
}