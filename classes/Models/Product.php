<?php
// require_once "classes/Db.php";
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;

class Product extends Db
{
    public function __construct()
    {
       
        $this->table = 'products';
        $this->connection();
        

    }
    public function selectID($id,$fil='products.*')
    {
        $sql = "SELECT $fil FROM $this->table JOIN 
        cats ON $this->table.cat_id=cats.id
         where $this->table.id=$id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);

    }

}
 