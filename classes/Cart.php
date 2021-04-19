<?php

namespace TechStore\Classes;

class Cart
{
    public function add(string $id, array $prodDate)
    {
        $_SESSION['cart'][$id] = $prodDate;

    }
    public function count()
    {
        return count($_SESSION['cart']);
    }
    public function  total()
    {
        $total=0;
        foreach ($_SESSION['cart'] as $id => $prodDate) {
            # code...
            $total+=$prodDate['qty'] * $prodDate['price'];
        }
        return $total;
        
    }
    public function has(string $id)
    {
    array_key_exists($id,$_SESSION['cart']);        
    }
    public function All(){
        return $_SESSION['cart'];
    }
    public function Remove(string $id){
        unset($_SESSION['cart'][$id]);

    }
    public function Empty(){
        $_SESSION['cart']=[];

    }

}
