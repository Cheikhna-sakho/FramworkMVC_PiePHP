<?php

namespace Model;

class UserModel extends \Core\ORM
{
    private $email;
    private $password;
    public $connect;
    public function __construct()
    {
        $bd = \Core\Database::connect();
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function save()
    {
        return $this->create("users",["email" => $this->email, "password" => $this->password]);
    }

    public function connexion()
    {
        $dataUser = ["email" => $this->email];
        $attributes = $this->initValues($dataUser, true);
        $query = "select * from users where {$attributes['values']}";
        return $this->mySql($query, $dataUser);
    }
}
