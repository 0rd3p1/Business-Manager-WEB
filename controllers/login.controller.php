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

    $user = $db->query(
        query: 'SELECT * FROM users WHERE email = :email',
        params: [
            'email' => $_POST['email']
        ]
    )->fetch();

    if ($user) {
        if(password_verify($_POST['pswd'], $user['pswd'])){
            $_SESSION['idUser'] = $user['id'];
            header('Location: /');
            exit();
        }
    }

    $_SESSION['message'] = "Email ou Senha inválidos!!";

    header('Location: /login');
    exit();
} else {
    view('login');
}

?>