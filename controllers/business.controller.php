<?php

// Verificando se existe um login na sessão
$business = $db->query(
    query: 'SELECT * FROM business WHERE idUser = :idUser',
    params: [
        'idUser' => $_SESSION['idUser']
    ]
)->fetchAll();

view('business', compact('business'));

?>