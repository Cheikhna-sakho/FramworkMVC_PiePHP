<?php
namespace Controller;
class AppController extends \Core\Controller
{
    function goodbyeAction()
    {
        echo 'madara';
    }
    public function indexAction()
    {
        echo 'hello le pangolin';
        // $this->render('User/register');
    }
}
