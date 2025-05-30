<?php

// Verificando os produtos cadastrados por negócio
$product = $db->query(
    query: 'SELECT * FROM products WHERE idBusiness = :idBusiness',
    params: [
        'idBusiness' => $_GET['idBusiness']
    ]
)->fetchAll();

// Verificando os negócios cadastrados
$business = $db->query(
    query: 'SELECT * FROM business WHERE idUser = :idUser',
    params: [
        'idUser' => $_SESSION['idUser']
    ]
)->fetchAll();

view('product', compact('business', 'product'))

?>