<?php

$id = $_GET['id'];

$product = $db->query(
    query: "SELECT * FROM products WHERE id = :id",
    params: [
        'id' => $id
    ]
)->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pay = $api->responseAPI();

    header("Location: /product");
    exit;
} else {
    view('payment', compact('product'));
}
