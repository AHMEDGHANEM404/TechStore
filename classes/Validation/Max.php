<?php 
namespace TechStore\Classes\Validation;



    class max implements validate{
        public function check(string $name,$value){
            if( strlen($name)>255){
                return "$name lenght must be less than 255";
            }
            return false;
        }
    }