<?php
    require_once("../app.php");
    use TechStore\Classes\Cart;
    if ($request->postHas('submit')) {
        $name= $request->post('name');
        $id= $request->post('id');
        $price= $request->post('price');
        $img= $request->post('img');
        $qty=$request->post('qty');
        $data=[
            "name"=>$name,
            "id"=>$id,
            "price"=>$price,
            "img"=>$img,
            "qty"=>$qty,
        ];
        
        $cart= new Cart;
        $cart->count();
        $cart->add($id,$data);

        echo "<pre>";
        echo($cart->count());
        echo "<pre>";
        

        $tot=$cart->total();
        echo $tot;
        $request->redirect("products.php");

    }