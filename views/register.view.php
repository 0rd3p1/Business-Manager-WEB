<div class="min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Registrar-se</h2>
    <form method="POST" class="space-y-4">
      <?php if (isset($_SESSION['message'])): ?>
        <div class="border-green-800 bg-green-900 text-green-400 px-4 py-1 rounded-md border-2">
          <?= $_SESSION['message'] ?>
        </div>
      <?php endif; ?>
      <?php if (isset($_SESSION['validation'])): ?>
        <div class="bg-red-500 text-white px-4 py-1 rounded-lg border-2 text-sm font-bold">
          <ul>
            <li>Erro de validação</li>
            <?php foreach ($_SESSION['validation'] as $validation): ?>
              <li><?= $validation ?></li>
            <?php endforeach;
            unset($_SESSION['validation']);
            ?>
          </ul>
        </div>
      <?php endif; ?>
      <div>
        <label for="name" class="block text-sm font-medium">Nome</label>
        <input type="text" name="name" id="name" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="email" class="block text-sm font-medium">E-mail</label>
        <input type="email" name="email" id="email" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="pswd" class="block text-sm font-medium">Senha</label>
        <input type="password" name="pswd" id="pswd" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="confirm" class="block text-sm font-medium">Confirmar Senha</label>
        <input type="password" name="confirm" id="confirm" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Registrar</button>
    </form>
    <p class="mt-4 text-sm text-center">Já tem uma conta? <a href="login" class="text-indigo-600 hover:underline">Entrar</a></p>
  </div>
</div>
