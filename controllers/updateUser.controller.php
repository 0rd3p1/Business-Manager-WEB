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
            $field => ['required', 'min:11', 'max:11']
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

    function formatPhone($phone) {
        $digits = preg_replace('/\D/', '', $phone);
        if (strlen($digits) === 11) {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $digits);
        } elseif (strlen($digits) === 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $digits);
        }
        return $phone;
    }

    function formatCPF($cpf) {
        $digits = preg_replace('/\D/', '', $cpf);
        if (strlen($digits) === 11) {
            return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $digits);
        }
        return $cpf;
    }

    function formatAddr($addr) {
        return ucwords(mb_strtolower($addr));
    }

    function formatBday($date) {
        // Se estiver no formato yyyy-mm-dd, converter para dd/mm/yyyy
        if (preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $date, $m)) {
            return "{$m[3]}/{$m[2]}/{$m[1]}";
        }
        // Caso já esteja em dd/mm/yyyy
        return $date;
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
            $value = formatBday($value);
            break;
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
