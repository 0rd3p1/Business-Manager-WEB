<?php






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field = $_POST['field'] ?? '';
    $value = trim($_POST['value'] ?? '');

    $validation = Validation::validate([
        $field => ['required']
    ], $_POST);

    if ($validation->notPass()) {
        $_SESSION['validation'] = $validation->validations;
        header("Location: /updateUser?field=$field");
        exit();
    }

    function formatPhone($phone)
    {
        $digits = preg_replace('/\D/', '', $phone);
        if (strlen($digits) === 11) {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $digits);
        } elseif (strlen($digits) === 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $digits);
        }
        return $phone;
    }

    function formatCPF($cpf)
    {
        $digits = preg_replace('/\D/', '', $cpf);
        if (strlen($digits) === 11) {
            return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $digits);
        }
        return $cpf;
    }

    function formatAddress($addr)
    {
        return ucwords(mb_strtolower($addr));
    }

    function formatBirthdate($date)
    {
        // Se estiver no formato dd/mm/yyyy, converter para yyyy-mm-dd
        if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $date, $m)) {
            return "{$m[3]}-{$m[2]}-{$m[1]}";
        }
        return $date; // caso já esteja em yyyy-mm-dd
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
            $value = formatAddress($value);
            break;
        case 'bday':
            $value = formatBirthdate($value);
            break;
    }

    if ($field == 'pswd') {
        $hash = password_hash($value, PASSWORD_DEFAULT);

        $db->query(
            query: "UPDATE users SET $field = $hash WHERE id = :id",
            params: [
                'id' => $_SESSION['idUser']
            ]
        );

        header("Location: /user");
        exit;
    }

    $db->query(
        query: "UPDATE users SET $field = $value WHERE id = :id",
        params: [
            'id' => $_SESSION['idUser']
        ]
    );

    header("Location: /user");
    exit;
} else {
    view('updateUser');
}
