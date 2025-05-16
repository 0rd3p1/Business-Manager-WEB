<?php

// Verificando se existe um login na sessão
$user = $db->query(
    query: 'SELECT * FROM users WHERE id = :id',
    params: [
        'id' => $_SESSION['idUser']
    ]
)->fetch();

view('user', compact('user'))

?>