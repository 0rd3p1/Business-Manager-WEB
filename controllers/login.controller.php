<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Aplica as Validaçoes
    $validation = Validation::validate([
        'email' => ['required'],
        'pswd' => ['required']
    ], $_POST);

    // Verifica se houve erro na validação
    if($validation->notPass()){
        $_SESSION['validation'] = $validation->validations;
        header('Location: /login');
        exit();
    }

    // Busca o email digitado no banco
    $auth = $db->query(
        query: 'SELECT * FROM users WHERE email = :email',
        params: [
            'email' => $_POST['email']
        ]
    )->fetch();

    // Verifica se é igual os dados digitados
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