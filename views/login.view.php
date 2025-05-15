<div class="min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Entrar</h2>
    <form method="POST" class="space-y-4">
      <?php if (isset($_SESSION['message'])): ?>
        <div class="bg-red-500 text-white px-4 py-1 rounded-lg border-2 font-bold">
          <?= $_SESSION['message'] ?>
        </div>
      <?php endif; unset($_SESSION['message']) ?>
      <div>
        <label for="email" class="block text-sm font-medium">E-mail</label>
        <input type="email" name="email" id="email" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="pswd" class="block text-sm font-medium">Senha</label>
        <input type="password" name="pswd" id="pswd" class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">Entrar</button>
    </form>
    <p class="mt-4 text-sm text-center">Não tem uma conta? <a href="register" class="text-indigo-600 hover:underline">Registre-se</a></p>
  </div>
</div>