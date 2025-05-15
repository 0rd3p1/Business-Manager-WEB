<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation = Validation::validate([
        'name' => ['required'],
        'email' => ['required', 'email'],
        'pswd' => ['required', 'confirm', 'strong', 'min:8', 'max:64']
    ], $_POST);

    if($validation->notPass()){
        $_SESSION['validation'] = $validation->validations;
        header('Location: /register');
        exit();
    }

    $hash = password_hash($_POST['pswd'], PASSWORD_DEFAULT);

    $db->query(
        query: 'INSERT INTO users (name, email, pswd) VALUES (:name, :email, :pswd)',
        params: [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'pswd' => $hash
        ]
    );

    $_SESSION['message'] = "Usuario cadastrado com sucesso!";

    header('Location: /register');
    exit();
} else {
    view('register');
}

?>