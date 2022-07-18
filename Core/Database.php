<?php

namespace Core;

class Database
{
    public static function connect()
    {
        // var_dump($_ENV['DB_CONNECT']);
        try {
            return new \PDO($_ENV["DB_HOST"],$_ENV["USERNAME"], $_ENV["PASSWORD"]);
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
