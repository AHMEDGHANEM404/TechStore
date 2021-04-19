<?php

namespace TechStore\Classes;

use mysqli;

abstract class Db
{
    protected $conn;
    protected $table;
    public function connection()    
    {

        // Create connection
        $this->conn = mysqli_connect(SERVER_NAME, DB_USER_NEME, DB_PASSWORD, DB_NAME);
    }

    public function selectAll($fil='*')
    {
        $sql = "SELECT $fil FROM $this->table";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }
    public function selectID($id,$fil='*')
    {
        $sql = "SELECT $fil FROM $this->table where id=$id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);

    }
    public function selectCondition($cond,$fil='*')
    {
        $sql = "SELECT $fil FROM $this->table where $cond";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);

    }
    function getCol(){
        $sql = "SELECT COUNT(*) AS cnt FROM $this->table";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result)['cnt'];

    }
    function insert( string $fild, string $value):bool
    {
        $sql="INSERT INTO $this->table ($fild) VALUES ($value)";
        return mysqli_query($this->conn,$sql);
        
    } 
    function insertID( string $fild, string $value):bool
    {
        $sql="INSERT INTO $this->table ($fild) VALUES ($value)";
        mysqli_query($this->conn,$sql);
         return mysqli_insert_id($this->conn);
        
    } 
    function update(string $set,$id){
        $sql="UPDATE $this->table SET $set WHERE id= $id";
        return mysqli_query($this->conn,$sql);
    }
    function delete($id){
        $sql="DELETE FROM $this->table WHERE id= $id";
        return mysqli_query($this->conn,$sql);
    }
}
