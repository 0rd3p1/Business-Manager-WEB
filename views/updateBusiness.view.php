<?php

// Pega e atribui os campos corretos de dados para alterar
$field = $_GET['field'] ?? null;
$fields = [
    'name' => 'Nome',
    'cnpj' => 'CNPJ'
];

// Atribui ao placeholder o exemplo correto de acordo com o dado alterado
$placeholder = '';
switch ($field) {
    case 'cpf':
        $placeholder = 'Ex.: 00.623.904/0001-73';
        break;
}

?>

<div class="max-w-xl mx-auto mt-80 mb-100 px-4">
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-blue-600 mb-6">
            Atualizar <?= $fields[$field] ?>
        </h2>

        <form method="POST" class="space-y-4">
            <!-- Field -->
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
            <!-- Value -->
            <input
                type="text"
                name="value"
                id="value"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="<?= $placeholder ?>" />
            <div class="flex justify-between">
                <a href="business" class="text-gray-600 hover:underline">Cancelar</a>
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>