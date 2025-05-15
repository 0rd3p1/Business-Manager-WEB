<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $db->query(
        query: 'SELECT * FROM users WHERE email = :email AND pswd = :pswd',
        params: [
            'email' => $_POST['email'],
            'pswd' => $_POST['pswd']
        ]
    )->fetch();

    if ($user) {
        $_SESSION['id'] = $user['id'];

        header('Location: /');
        exit();
    }

    $_SESSION['message'] = "Erro no login!";

    header('Location: /login');
    exit();
} else {
    view('login');
}

?>