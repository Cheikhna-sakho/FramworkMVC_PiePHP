<?php

namespace Core;

abstract class ORM
{
    // public $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    function mySql($selecteur, array $execute = [])
    {
        $db = Database::connect();
        $Get =  $db->prepare($selecteur);
        $Get->execute($execute);
        $recipes = $Get->fetchAll(\PDO::FETCH_ASSOC);
        return $recipes;
    }
    function initValues($fields, $confirmToUpdate = false)
    {
        foreach ($fields as $key => $value) {
            $values[] = ":{$key}";
            $cols[] = $confirmToUpdate ? "{$key}= :{$key}" : $key;
        }
        $cols = trim(implode(', ', $cols));
        $values = trim(implode(', ', $values));
        return compact('values', 'cols');
    }
    public function create($table, $fields)
    {
        $attributes = $this->initValues($fields);
        $query = "INSERT INTO $table ({$attributes['cols']}) VALUES ({$attributes['values']})";
        $this->mySql($query, $fields);
        return $this->bd->Lastinsertid();
    }

    public function update()
    {
    }

    public function read($table, $id)
    {
        $query = "select * from $table where id = $id";
        return $this->mySql($query, [$id]);
    }

    public function delete($table, $id)
    {
        $query = "delete from $table where id = $id";
        return $this->mySql($query, [$id]);
    }

    public function find($table, $parmas = array('where' => 'id= 1', 'order by' => 'id asc', 'limit' => '1'))
    {
        $query = "select * from $table " . implode(' ', $parmas);
        return $this->mySql($query);
    }
}
