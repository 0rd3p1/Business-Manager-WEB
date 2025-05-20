<?php

function dd(...$dump) {
    echo '<pre>';
    var_dump($dump);
    echo '</pre>';
    die();
}

function view($route, $data = []) {
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require 'views/template/app.php';
}

function abort($code) {
    http_response_code($code);
    view($code);
    die();
}

function formatPhone($phone) {
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) === 11) {
        return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $digits);
    } elseif (strlen($digits) === 10) {
        return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $digits);
    }
    return $phone;
}

function formatCPF($cpf) {
    $digits = preg_replace('/\D/', '', $cpf);
    if (strlen($digits) === 11) {
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $digits);
    }
    return $cpf;
}

function formatAddr($addr) {
    return ucwords(mb_strtolower($addr));
}

function formatDate($date) {
    if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $date, $m)) {
        return "{$m[3]}/{$m[2]}/{$m[1]}";
    }

    return $date;
}

function formatCnpj($cnpj) {
    $digits = preg_replace('/\D/', '', $cnpj);

    if (strlen($digits) !== 14) {
        return $cnpj;
    }

    return preg_replace(
        '/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/',
        '$1.$2.$3/$4-$5',
        $digits
    );
}