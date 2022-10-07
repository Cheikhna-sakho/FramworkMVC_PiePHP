<?php

namespace Controller;

class CinemaController extends \Core\Controller
{
    function __construct()
    {
        $this->request = \Core\Request::req();
        $this->model = new \Model\CinemaModel();
        // var_dump($this->model);
    }

    public function indexAction()
    {
        $element = $this->model->allMovies();
        $this->render("movies", compact("element")); 
    }
    //Movies
    public function moviesAction()
    {
        $element = $this->model->allMovies();
        $this->render("movies", compact("element"));
    }
    //
    public function movieAction()
    {
        $element = $this->model->movies();
        if (!empty($this->request["id"])) {
            $this->model->movie($this->request["id"]);
        }
        $this->render("movies", compact("element"));
    }
    //
    //Members
    public function membersAction()
    {
        $element = $this->model->allMembers();
        $this->render("members", compact("element"));
    }
    //
    public function memberAction()
    {
        if ($this->request["id"]) {
            $element = $this->model->member($this->request["id"]);
            $this->render("member", compact("element"));
        }
    }
}
