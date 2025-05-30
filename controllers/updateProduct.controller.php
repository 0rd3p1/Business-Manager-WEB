<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega o valor do POST e atribui ás variáveis com segurança 
    $field = $_POST['field'] ?? '';
    $value = trim($_POST['value'] ?? '');

    // Juntando o campo com o valor passando como parâmetro no validate para o Validation entender ('field' = 'value')
    $parsedPost = [$field => $value];

    // Se a atualização de cadastro for de telefone ou CPF irá ter min e max de caracteres de 11
    if ($field == 'name' || $field == 'price') {
        $validation = Validation::validate([
            $field => ['required']
        ], $parsedPost);
    }

    // Verifica se teve erro na validação
    if ($validation->notPass()) {
        $_SESSION['validation'] = $validation->validations;
        header("Location: /updateProduct?field=$field");
        exit();
    }

    // Busca no banco o cnpj digitado
    $auth = $db->query(
        query: 'SELECT * FROM products WHERE name = :name',
        params: [
            'name' => $value
        ]
    )->fetch();

    // Verifica se existe o cnpj digitado já cadastrado
    if ($auth) {
        $_SESSION['error'] = "Produto já cadastrado!";
        header('Location: /updateProduct');
        exit();
    }

    $db->query(
        query: "UPDATE products SET $field = :value WHERE id = :id",
        params: [
            'value' => $value,
            'id' => $product['id']  // NAO ESTA RECEBENDO NENHUM DADO NO ARRAY   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        ]
    );

    header("Location: /product");
    exit;
} else {
    view('updateProduct');
}