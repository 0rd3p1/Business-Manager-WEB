<?php

// Verificando se existe um negócio cadastrado para mostrar
$business = $db->query(
    query: 'SELECT * FROM business WHERE idUser = :idUser',
    params: [
        'idUser' => $_SESSION['idUser']
    ]
)->fetchAll();

view('business', compact('business'));

?>