<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aplica as Validaçoes
    $validation = Validation::validate([
        'name' => ['required'],
        'cnpj' => ['required', 'min:14', 'max:18']
    ], $_POST);

    // Verifica se houve erro na validação
    if ($validation->notPass()) {
        $_SESSION['validation'] = $validation->validations;
        header('Location: /registerBusiness');
        exit();
    }

    // Busca no banco o negócio digitado
    $auth = $db->query(
        query: 'SELECT * FROM business WHERE cnpj = :cnpj',
        params: [
            'cnpj' => formatCnpj($_POST['cnpj'])
        ]
    )->fetch();

    // Verifica se existe o cnpj digitado já cadastrado
    if ($auth) {
        $_SESSION['error'] = "CNPJ ja cadastrado!";
        header('Location: /registerBusiness');
        exit();
    }

    $db->query(
        query: 'INSERT INTO business (name, cnpj, idUser) VALUES (:name, :cnpj, :idUser)',
        params: [
            'name' => $_POST['name'],
            'cnpj' => formatCnpj($_POST['cnpj']),
            'idUser' => $_SESSION['idUser']
        ]
    );

    $_SESSION['message'] = "Negócio cadastrado com sucesso!";

    header('Location: /registerBusiness');
    exit();
} else {
    view('registerBusiness');
}
