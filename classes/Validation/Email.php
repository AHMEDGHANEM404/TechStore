<?php 
namespace TechStore\Classes\Validation;



    class email implements validate{
        public function check(string $name,$value){
            if(! filter_var($value,FILTER_VALIDATE_EMAIL)){
                return "$name not avalid e-mail";
            }
            return false;
        }
    }