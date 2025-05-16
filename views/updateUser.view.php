<?php

$field = $_GET['field'] ?? null;
$fields = [
    'name' => 'Nome',
    'email' => 'E-mail',
    'pswd' => 'Senha',
    'phone' => 'Telefone',
    'cpf' => 'CPF',
    'bday' => 'Data de Nascimento',
    'addr' => 'Endereço'
];

$placeholder = '';
switch ($field) {
    case 'name':
        $placeholder = 'Seu nome completo';
        break;
    case 'email':
        $placeholder = 'Ex.: exemplo@email.com';
        break;
    case 'phone':
        $placeholder = 'Ex.: (51) 92345-6789';
        break;
    case 'cpf':
        $placeholder = 'Ex.: 123.456.789-09';
        break;
    case 'addr':
        $placeholder = 'Ex.: Rua Exemplo, 123 - Centro';
        break;
}

?>

<div class="max-w-xl mx-auto mt-80 mb-100 px-4">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-blue-600 mb-6">
            Atualizar <?= $fields[$field] ?>
        </h2>

        <form action="updateUser" method="POST" class="space-y-4">
            <input type="hidden" name="field" value="<?= htmlspecialchars($field) ?>" />
            <?php if (isset($_SESSION['validation'])): ?>
                <div class="bg-red-500 text-white px-4 py-1 rounded text-sm font-bold">
                    <ul>
                        <li>Erro de validação</li>
                        <?php foreach ($_SESSION['validation'] as $validation): ?>
                            <li><?= $validation ?></li>
                        <?php endforeach;
                        unset($_SESSION['validation']);
                        ?>
                    </ul>
                </div>
            <?php endif; unset($_SESSION['validation']) ?>
            <input
                type="<?= $field === 'email' ? 'email' : ($field === 'pswd' ? 'password' : ($field === 'bday' ? 'date' : 'text')) ?>"
                name="value"
                id="pswd"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="<?= $placeholder ?>" />
            <?php if ($field == 'pswd') : ?>
                <input type="checkbox" name="showPswd" id="showPswd"><a class="text-sm font-medium"> Mostrar Senha </a>
                <script>
                    const pswdInput = document.getElementById('pswd');
                    const showPswdCheckbox = document.getElementById('showPswd');

                    showPswdCheckbox.addEventListener('change', () => {
                        pswdInput.type = showPswdCheckbox.checked ? 'text' : 'password';
                    });
                </script>

            <?php endif; ?>
            <div class="flex justify-between">
                <a href="user" class="text-gray-600 hover:underline">Cancelar</a>
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>