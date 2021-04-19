<?php
// require_once "classes/Db.php";
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;

class OrderDetalis extends Db
{
    public function __construct()
    {
       
        $this->table = 'order_detalis';
        $this->connection();
        

    }

}
 