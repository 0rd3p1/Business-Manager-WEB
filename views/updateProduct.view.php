<?php

// Pega e atribui os campos corretos de dados para alterar
$field = $_GET['field'] ?? null;
$fields = [
    'name' => 'Nome',
    'price' => 'Preço',
    'stock' => 'Estoque',
    'description' => 'Descrição'
];

if ($field == 'price') {
    $type = '<input
                type="number"
                step="0.01"
                name="value"
                id="value"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>';
} elseif ($field == 'description') {
    $type = '<textarea 
                name="description" 
                id="description" 
                rows="5" 
                class="mt-1 w-full p-2 border border-gray-300 rounded resize-y">
                </textarea>';
} elseif ($field == 'stock') {
    $type = '<input
                type="number"
                name="value"
                id="value"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>';
} else {
    $type = '<input
                type="text"
                name="value"
                id="value"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>';
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
            <?= $type ?>
            <div class="flex justify-between">
                <a href="product" class="text-gray-600 hover:underline">Cancelar</a>
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>