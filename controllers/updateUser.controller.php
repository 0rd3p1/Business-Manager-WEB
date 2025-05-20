<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega o valor do POST e atribui ás variáveis com segurança 
    $field = $_POST['field'] ?? '';
    $value = trim($_POST['value'] ?? '');

    // Juntando o campo com o valor passando como parâmetro no validate para o Validation entender ('field' = 'value')
    $parsedPost = [$field => $value];

    // Se a atualização de cadastro for de telefone ou CPF irá ter min e max de caracteres de 11
    if ($field == 'phone' || $field == 'cpf') {
        $validation = Validation::validate([
            $field => ['required', 'min:11', 'max:14']
        ], $parsedPost);
    } else {
        $validation = Validation::validate([
            $field => ['required']
        ], $parsedPost);
    }

    // Verifica se teve erro na validação
    if ($validation->notPass()) {
        $_SESSION['validation'] = $validation->validations;
        header("Location: /updateUser?field=$field");
        exit();
    }

    // Aplicar formatação conforme o campo
    switch ($field) {
        case 'phone':
            $value = formatPhone($value);
            break;
        case 'cpf':
            $value = formatCPF($value);
            break;
        case 'addr':
            $value = formatAddr($value);
            break;
        case 'bday':
            $value = formatDate($value);
            break;
    }

    // Busca no banco o email digitado
    $auth = $db->query(
        query: 'SELECT * FROM users WHERE email = :email',
        params: [
            'email' => $_POST['email']
        ]
    )->fetch();

    // Verifica se existe o cnpj digitado já cadastrado
    if ($auth) {
        $_SESSION['error'] = "Email ja cadastrado!";
        header('Location: /updateUser');
        exit();
    }

    // Se for senha, irá com hash
    if ($field == 'pswd') {
        $hash = password_hash($value, PASSWORD_DEFAULT);

        $db->query(
            query: "UPDATE users SET $field = :hash WHERE id = :id",
            params: [
                'hash' => $hash,
                'id' => $_SESSION['idUser']
            ]
        );

        header("Location: /user");
        exit;
    }


    $db->query(
        query: "UPDATE users SET $field = :value WHERE id = :id",
        params: [
            'value' => $value,
            'id' => $_SESSION['idUser']
        ]
    );

    header("Location: /user");
    exit;
} else {
    view('updateUser');
}