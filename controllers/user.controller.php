<?php

// Verificando se existe o login digitado
$user = $db->query(
    query: 'SELECT * FROM users WHERE id = :id',
    params: [
        'id' => $_SESSION['idUser']
    ]
)->fetch();

view('user', compact('user'))

?>