<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aplica as Validaçoes
    $validation = Validation::validate([
        'name' => ['required'],
        'email' => ['required', 'email'],
        'pswd' => ['required', 'confirm', 'strong', 'min:8', 'max:64']
    ], $_POST);

    // Verifica se houve erro na validação
    if($validation->notPass()){
        $_SESSION['validation'] = $validation->validations;
        header('Location: /registerUser');
        exit();
    } else {
        $hash = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    }

    // Busca no banco o email digitado
    $auth = $db->query(
        query: 'SELECT * FROM users WHERE email = :email',
        params: [
            'email' => $_POST['email']
        ]
    )->fetch();

    // Verifica se existe o email digitado já cadastrado
    if ($auth) {
        $_SESSION['error'] = "Email ja cadastrado!";
        header('Location: /registerUser');
        exit();
    }

    $db->query(
        query: 'INSERT INTO users (name, email, pswd) VALUES (:name, :email, :pswd)',
        params: [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'pswd' => $hash
        ]
    );

    $_SESSION['message'] = "Usuario cadastrado com sucesso!";

    header('Location: /registerUser');
    exit();
} else {
    view('registerUser');
}

?>