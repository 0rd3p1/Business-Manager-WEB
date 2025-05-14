<?php

class Validation {
    public $validations;

    public static function validate($rules, $data) {
        $validations = new self;

        // $camp = email 
        // $campRules = 'required', 'email', 'confirmed';

        foreach ($rules as $camp => $campRules) {

            //$rule = required, $rule = email, $rule = $confimed

            foreach ($campRules as $rule) {
                $campValue = $data[$camp];
                if ($rule == 'confirmed') {
                    $validations->$rule($camp, $campValue, $data["{$camp}_confirmation"]);
                }elseif(str_contains($rule, ':')){
                    $tmp = explode(':', $rule);
                    $rule = $tmp[0];
                    $ruleAr = $tmp[1];  
                    $validations->$rule($ruleAr, $camp, $campValue);
                }else {
                    $validations->$rule($camp, $campValue);
                }
            }
        }
        return $validations;
    }

    private function required($camp, $value) {
        if (strlen($value) == 0) {
            $this->validations[] = "O $camp é obrigatorio.";
        }
    }
    private function email($camp, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->validations[] = "O $camp é invalido.";
        }
    }

    private function confirmed($camp, $value, $confirmValue) {
        if ($value != $confirmValue) {
            $this->validations[] = "O $camp de confirmação esta diferente.";
        }
    }

    public function strong($camp, $value) {
        if (!strpbrk($value, '!@#$%^*&()')) {
            $this->validations[] = "O $camp precisa ter no minimo um caracter especial";
        }
    }

    public function min ($min, $camp, $value) {
        if ($value < $min) {
            $this->validations[] = "O $camp precisa ter no minimo $min caracteres";
        }
    }

    public function max ($max, $camp, $value) {
        if ($value > $max) {
            $this->validations[] = "O $camp precisa ter no maximo $max caracteres";
        }
    }

    public function notPass() {
        return sizeof($this->validations) > 0;
    }
}