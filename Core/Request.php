<?php
namespace Core;
class Request
{
    static function  req()
    {
        $requette = [];
        foreach ($_REQUEST as $key => $value) {
            $requette[$key] = htmlspecialchars(trim(stripslashes($value)));
        }
        return $requette;
    }
}
