<?php

// Verificando os produtos cadastrados por negócio
$product = $db->query(
    query: 'SELECT * FROM products WHERE id = :id',
    params: [
        'id' => $_GET['id']
    ]
)->fetchAll();

// Verificando os negócios cadastrados
$business = $db->query(
    query: 'SELECT * FROM business WHERE idUser = :idUser',
    params: [
        'idUser' => $_SESSION['idUser']
    ]
)->fetchAll();

view('product', compact('product'), compact('business'))

?>