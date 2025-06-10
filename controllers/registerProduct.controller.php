<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Resgata a variável GET na URI
    $idBusiness = $_GET['idBusiness'];

    // Aplica as Validaçoes
    $validation = Validation::validate([
        'name' => ['required'],
        'price' => ['required'],
    ], $_POST);

    // Verifica se houve erro na validação
    if ($validation->notPass()) {
        $_SESSION['validation'] = $validation->validations;
        header("Location: /registerProduct?idBusiness=$idBusiness");
        exit();
    }

    // Busca no banco o negócio digitado
    $auth = $db->query(
        query: 'SELECT * FROM products WHERE name = :name',
        params: [
            'name' => $_POST['name']
        ]
    )->fetch();

    // Verifica se existe o cnpj digitado já cadastrado
    if ($auth) {
        $_SESSION['error'] = "Produto já existente!";
        header("Location: /registerProduct?idBusiness=$idBusiness");
    }

    if ($_POST['stock'] == null) {
        $stock = 0;
    }

    $db->query(
        query: 'INSERT INTO products (name, price, stock, description, idBusiness) VALUES (:name, :price, :stock, :description, :idBusiness)',
        params: [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'stock' => $stock,
            'description' => $_POST['description'],
            'idBusiness' => $_GET['idBusiness']
        ]
    );

    $_SESSION['message'] = "Produto cadastrado!";

    header("Location: /registerProduct?idBusiness=$idBusiness");
    exit();
} else {
    view('registerProduct');
}
