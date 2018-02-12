<?php

/**
 * Created by PhpStorm.
 * User: shazzad
 * Date: 5/5/2016
 * Time: 5:04 PM
 */
class DB
{
    public $dbc, $query, $result, $error = false, $count = 0;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->dbc = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/name'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $this->error = false;
        if($this->query = $this->dbc->prepare($sql))
        {
            if(count($params)){
                $x = 1;
                foreach ($params as $param) {
                    $this->query->bindValue($x, $param);
                    $x++;
                }
            }
            if($this->query->execute())
            {
                $this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
                $this->count = $this->query->rowCount();
            } else {
                $this->error = true;
            }
        }
        return $this;

    }

    public function action($action, $table, $where = [])
    {
        if(count($where) == 3){
            $operators = ['=','<', '>', '=>', '=<'];
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];
            if(in_array($operator, $operators)){
                $sql = "{$action} FROM `{$table}` WHERE `{$field}` {$operator} ?";
                if(!$this->query($sql, array($value))->error()){
                    return $this;
                }
            }
        }
        return false;
    }
    
    public function insert($table, $fields = [])
    {
        if(count($fields)){
            $x = 1;
            $value = "";
            $keys = array_keys($fields);
            foreach ($fields as $field) {
                $value .= "?";
                if($x < count($fields)){
                    $value .= ", ";
                }
                $x++;
            }
            $sql = "INSERT INTO `{$table}` (`".implode('`, `', $keys)."`) VALUES({$value})";
            if(!$this->query($sql, $fields)->error()){
                return true;
            }
        }
        return false;
    }

    public function update($table, $id, $fields = [])
    {
       if(count($fields)){
           $x = 1;
           $set = "";
           foreach ($fields as $field => $value) {
               $set .= "{$field} = ?";
               if($x < count($fields)){
                   $set .= ", ";
               }
               $x++;
           }
           $sql = "UPDATE `{$table}` SET {$set} WHERE `year_id` < '$id'";
           if(!$this->query($sql, $fields)->error()){

               return true;
           }
       }
        return false;
    }

    public function propertyUpdate($table, $propertyId, $quarterId, $yearId, $fields = [])
    {
        if(count($fields)){
            $x = 1;
            $set = "";
            foreach ($fields as $field => $value) {
                $set .= "{$field} = ?";
                if($x < count($fields)){
                    $set .= ", ";
                }
                $x++;
            }
            $sql = "UPDATE `{$table}` SET {$set} WHERE `property_id` = '$propertyId' AND `quarter_id` = '$quarterId' AND `year_id` = '$yearId'";
            if(!$this->query($sql, $fields)->error()){

                return true;
            }
        }
        return false;
    }

    public function delete($table, $where){
        return $this->action('DELETE', $table, $where);
    }

    public function get($table, $where){
        return $this->action('SELECT *', $table, $where);
    }

    public function fetchAll($table)
    {
        $sql = "SELECT * FROM `{$table}`";
        if(!$this->query($sql)->error()){
            return $this;
        }
        return false;
    }

    public function result()
    {
        return $this->result;
    }

    public function first()
    {
        return $this->result()[0];
    }

    public function error()
    {
        return $this->error;
    }

    public function count()
    {
        return $this->count;
    }

    public function insertId()
    {
        return $this->dbc->lastInsertId();
    }
}