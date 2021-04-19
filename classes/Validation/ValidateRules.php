<?php
// use TechStore\Classes\Models\validorRules;
namespace TechStore\Classes\Validation;

    interface validate{
        public function check(string $name ,$value);
    }