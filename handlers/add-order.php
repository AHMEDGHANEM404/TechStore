<?php
require_once "../app.php";
// require_once("classes/Validation/Validator.php");

use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetalis;
use TechStore\Classes\Validation\Validator;
use TechStore\Classes\Cart;
use TechStore\Classes\Validation\required;

if ($request->postHas('submit')) {
    $name = $request->post('name');
    $phone = $request->post('phone');
    $address = $request->post('address');
    $email = $request->post('email');

    $validator = new Validator;
    $validator->validate('name', $name, []);
    if (!empty($email)) {
        # code...
        $validator->validate('email', $email, []);
        $email="'$email'";
    }else{
        $email="null";

    }
    $validator->validate('phone', $phone, []);
    if (!empty($address)) {

        $validator->validate('address', $address, []);
        $address="'$address'";

    }else{
        $address="null";
    }

    if ($validator->hasError()) {
        $session->set("errors",$validator->getErrors());
        $request->redirect("cart.php");

    }else{
        $order=new Order;
        $orderDetals=new OrderDetalis;
        $cart= new Cart;


        $orderId=$order->insertID("name,email,address,phone","'$name','$email','$address','$phone'");
    }
    foreach ($cart->All() as $prodId =>$data) {
        # code...   
        $qty=$data['qty'];
        $orderDetals->insert("order_id,product_id,qty","'$orderId','$prodId','$qty'");
        // $tot=$cart->total();
        // echo $tot;
        
    }
    $cart->Empty();
    $request->redirect("products.php");

    
}else{

    $request->redirect("products.php");
}