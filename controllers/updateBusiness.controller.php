<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega o valor do POST e atribui ás variáveis com segurança 
    $field = $_POST['field'] ?? '';
    $value = trim($_POST['value'] ?? '');

    // Juntando o campo com o valor passando como parâmetro no validate para o Validation entender ('field' = 'value')
    $parsedPost = [$field => $value];

    // Se a atualização de cadastro for de telefone ou CPF irá ter min e max de caracteres de 11
    if ($field == 'cnpj') {
        $validation = Validation::validate([
            $field => ['required', 'min:14', 'max:18']
        ], $parsedPost);
    } else {
        $validation = Validation::validate([
            $field => ['required']
        ], $parsedPost);
    }

    // Verifica se teve erro na validação
    if ($validation->notPass()) {
        $_SESSION['validation'] = $validation->validations;
        header("Location: /updateBusiness?field=$field");
        exit();
    }

    // Aplicar formatação conforme o campo
    switch ($field) {
        case 'cnpj':
            $value = formatCnpj($value);
            break;
    }

    // Busca no banco o cnpj digitado
    $auth = $db->query(
        query: 'SELECT * FROM business WHERE cnpj = :cnpj',
        params: [
            'cnpj' => $value
        ]
    )->fetch();

    // Verifica se existe o cnpj digitado já cadastrado
    if ($auth) {
        $_SESSION['error'] = "CNPJ ja cadastrado!";
        header('Location: /updateBusiness');
        exit();
    }

    $db->query(
        query: "UPDATE business SET $field = :value WHERE id = :id",
        params: [
            'value' => $value,
            'id' => $business['id']
        ]
    );

    header("Location: /business");
    exit;
} else {
    view('updateBusiness');
}