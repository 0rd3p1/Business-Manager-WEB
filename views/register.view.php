<div class="min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Registrar-se</h2>
    <form method="POST" class="space-y-4">
      <?php if (isset($_SESSION['error'])): ?>
        <div class="flex place-content-center bg-red-500 text-white px-4 py-1 rounded font-bold">
          <?= $_SESSION['error'] ?>
        </div>
      <?php endif; unset($_SESSION['error']) ?>
      <?php if (isset($_SESSION['message'])): ?>
        <div class="flex place-content-center bg-green-500 text-white px-4 py-1 rounded">
          <?= $_SESSION['message'] ?>
        </div>
      <?php endif; unset($_SESSION['message']) ?>
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
      <div>
        <label for="name" class="block text-sm font-medium">Nome</label>
        <input type="text" name="name" id="name" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="email" class="block text-sm font-medium">Email</label>
        <input type="email" name="email" id="email" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="pswd" class="block text-sm font-medium">Senha</label>
        <input type="password" name="pswd" id="pswd" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="confirmation" class="block text-sm font-medium">Confirmar Senha</label>
        <input type="password" name="confirmation" id="confirmation" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Registrar</button>
    </form>
    <p class="mt-4 text-sm text-center">Já tem uma conta? <a href="login" class="text-indigo-600 hover:underline">Entrar</a></p>
  </div>
</div>
