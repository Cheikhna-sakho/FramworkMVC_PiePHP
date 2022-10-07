<?php

namespace Model;


class CinemaModel extends \Core\ORM
{


    function __construct()
    {
        $this->movie_select = "SELECT * ,
         distributor.name as d_name, genre.name as g_name FROM movie 
         INNER JOIN movie_genre 
         ON movie.id = movie_genre.id_movie  
         INNER JOIN genre 
         ON genre.id = movie_genre.id_genre 
         INNER JOIN distributor 
         ON distributor.id = movie.id_distributor ";
        $this->member_select = "SELECT * FROM membership INNER JOIN user ON user.id = membership.id_user ";
        //
    }

    function getAtribut(array $atribut, $compact = false, $arrayAssoc = false)
    {
        foreach ($atribut as $key => $value) {
            $cols = $compact ? "{$key}= :{$key}" : $key;
            $values = $arrayAssoc ? ":{$key}" : "?";
        }
    }

    function allMovies()
    {
        return $this->mySql($this->movie_select);
    }
    function allMembers()
    {
        return $this->mySql($this->member_select);
    }
    function movie($id)
    {
        return $this->mySql($this->movie_select . "AND movie.id= ?", [$id]);
    }
    function genre($id)
    {
        return $this->mySql($this->movie_select . "AND genre.id= ?", [$id]);
    }
    function member($id)
    {
        return $this->mySql($this->member_select . "AND  membership.id_user=?", [$id]);
    }
}
