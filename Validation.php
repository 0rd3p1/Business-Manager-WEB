<?php

class Validation {
    public $validations;
    public $camps = [
            'name' => 'O Nome',
            'email' => 'O Email',
            'pswd' => 'A Senha',
            'cpnj' => 'O CNPJ',
            'cpf' => 'O CPF',
            'price' => 'O Preço',
            'description' => 'A Descrição',
            'stock' => 'O Estoque'
        ];

    public function __construct() {
        $this->validations = [];
    }

    public static function validate($rules, $data) {
        $validations = new self;
        // $campRules = 'required', 'email', 'confirmed';
        foreach ($rules as $camp => $campRules) {
            //$rule = required, $rule = email, $rule = confimed
            foreach ($campRules as $rule) {
                $campValue = $data[$camp] ?? '';
                if ($rule == 'confirm') {
                    $validations->$rule($camp, $campValue, $data['confirmation'] ?? '');
                } elseif (str_contains($rule, ':')) {
                    $tmp = explode(':', $rule);
                    $rule = $tmp[0];
                    $ruleAr = $tmp[1];
                    $validations->$rule($ruleAr, $camp, $campValue);
                } else {
                    $validations->$rule($camp, $campValue);
                }
            }
        }
        return $validations;
    }

    private function required($camp, $value) {
        if (trim($value) == '') {
            $this->validations[] = $this->camps[$camp] . " é obrigatório";
        }
    }
    private function email($camp, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->validations[] = "Email inválido";
        }
    }

    private function confirm($camp, $value, $confirmValue) {
        if ($value != $confirmValue) {
            $this->validations[] = $this->camps[$camp] . " de confirmação esta diferente";
        }
    }

    public function strong($camp, $value) {
        if (!strpbrk($value, '!@#$%^*&?.')) {
            $this->validations[] = $this->camps[$camp] . " precisa ter no mínimo um caracter especial";
        }
    }

    public function min($min, $camp, $value) {
        if (strlen($value) < $min) {
            $this->validations[] = $this->camps[$camp] . " precisa ter no mínimo $min caracteres";
        }
    }

    public function max($max, $camp, $value) {
        if (strlen($value) > $max) {
            $this->validations[] = $this->camps[$camp] . " pode ter no máximo $max caracteres";
        }
    }

    public function notPass() {
        return sizeof($this->validations) > 0;
    }
}
