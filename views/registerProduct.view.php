<div class="min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Registrar Produto</h2>
    <form method="POST" class="space-y-4">
      <!-- Error -->
      <?php if (isset($_SESSION['error'])): ?>
        <div class="flex place-content-center bg-red-500 text-white px-4 py-1 rounded font-bold">
          <?= $_SESSION['error'] ?>
        </div>
      <?php endif; unset($_SESSION['error']) ?>
      <!-- Menssagem -->
      <?php if (isset($_SESSION['message'])): ?>
        <div class="flex place-content-center bg-green-500 text-white px-4 py-1 rounded font-bold">
          <?= $_SESSION['message'] ?>
        </div>
      <?php endif; unset($_SESSION['message']) ?>
      <!-- Validações -->
      <?php if (isset($_SESSION['validation'])): ?>
        <div class="bg-red-500 text-white px-4 py-1 rounded text-sm font-bold">
          <ul>
            <li>Erro de validação</li>
            <?php foreach ($_SESSION['validation'] as $validation): ?>
              <li><?= $validation ?></li>
            <?php endforeach; unset($_SESSION['validation']) ?>
          </ul>
        </div>
      <?php endif; unset($_SESSION['validation']) ?>
      <!-- Nome -->
      <div>
        <label for="name" class="block text-sm font-medium">Nome</label>
        <input type="text" name="name" id="name" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <!-- Preço -->
      <div>
        <label for="price" class="block text-sm font-medium">Preço</label>
        <input type="number" step="0.01" name="price" id="price" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <!-- Estoque -->
      <div>
        <label for="stock" class="block text-sm font-medium">Estoque</label>
        <input type="number" name="stock" id="stock" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <!-- Descrição -->
      <div>
        <label for="description" class="block text-sm font-medium">Descrição</label>
        <textarea name="description" id="description" rows="5" class="mt-1 w-full p-2 border border-gray-300 rounded resize-y"></textarea>
      </div>
      <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Registrar</button>
    </form>
  </div>
</div>