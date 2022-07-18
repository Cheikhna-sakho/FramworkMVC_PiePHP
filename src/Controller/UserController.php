<?php

namespace Controller;

class UserController extends \Core\Controller
{
    public $request;
    protected $model;
    function __construct()
    {
        $this->request = \Core\Request::req();
        // $this->model = new \Model\UserModel();
    }
 
    function addAction()
    {
        return $this->render('register');
    }

    function loginAction()
    {
        return $this->render('login');
    }

    public function registerAction()
    {
        $email = isset($this->request['email']) ? $this->request['email'] : null;
        $password = isset($this->request['password']) ? $this->request['password'] : null;
        $user =  $this->model->create('users', ['email' => $email, 'password' => $password]);
        var_dump($user);
    }

    public function connexionAction()
    {
        $email = isset($this->request['email']) ? $this->request['email'] : null;
        $password = isset($this->request['password']) ? $this->request['password'] : null;

       
        $this->model->setEmail($email);
        $this->model->setPassword($password);
        $id = $this->model->connexion();
        if ($id['email'] === $email) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id['id'];
        }
    }
}
