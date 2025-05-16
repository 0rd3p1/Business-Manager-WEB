<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $validation = Validation::validate([
        'email' => ['required'],
        'pswd' => ['required']
    ], $_POST);

    if($validation->notPass()){
        $_SESSION['validation'] = $validation->validations;
        header('Location: /login');
        exit();
    }

    $auth = $db->query(
        query: 'SELECT * FROM users WHERE email = :email',
        params: [
            'email' => $_POST['email']
        ]
    )->fetch();

    if ($auth) {
        if(password_verify($_POST['pswd'], $auth['pswd'])){
            $_SESSION['idUser'] = $auth['id'];
            header('Location: /');
            exit();
        }
    }

    $_SESSION['error'] = "Email ou Senha inválidos!!";

    header('Location: /login');
    exit();
} else {
    view('login');
}

?>