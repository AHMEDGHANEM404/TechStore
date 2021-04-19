<?php 
namespace TechStore\Classes\Validation;



    class numeric implements validate{
        public function check(string $name,$value){
            if(! is_numeric($value)){
                return "$name must be number";
            }
            return false;
        }
    }