<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation = Validation::validate([
        'Nome' => ['required'],
        'Email' => ['required', 'email', 'confirmed'],
        'Senha' => ['required',  'strong', 'min:8', 'max:64']
    ], $_POST);

    if($validation->notPass()){
        $_SESSION['validation'] = $validation->validations;
        header('Location: register');
        exit();
    }

    $db->query(
        query: 'INSERT INTO users (name, email, pswd) VALUES (:name, :email, :pswd)',
        params: [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'pswd' => $_POST['pswd']
        ]
    );

    $_SESSION['message'] = "Usuario cadastrado com sucesso!";

    header('Location: login');
    exit();
} else {
    view('register');
}

?>