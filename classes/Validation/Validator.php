<?php



namespace TechStore\Classes\Validation;

class Validator
{
    private $errors = [];
    public function validate(string $name, $value, array $rules)
    {
        foreach ($rules as $rule) {
            $className="TechStore\\Classes\\Validation\\" . $rule;
            $obj=new $className; 
            $error = $obj->check($name, $value);
            if ($error != false) { 
                $this->errors[] = $error;
                break;
            }

        }

    }
    function getErrors(){
        return $this->errors;
    }
    function hasError(): bool
    {
        return(!empty($this->errors));
        
    }
}
