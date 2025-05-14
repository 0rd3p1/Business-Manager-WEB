<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Entrar</h2>
    <form method="POST" class="space-y-4">
      <div>
        <label for="email" class="block text-sm font-medium">E-mail</label>
        <input type="email" name="email" id="email" required class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="pswd" class="block text-sm font-medium">Senha</label>
        <input type="password" name="pswd" id="pswd" required class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">Entrar</button>
    </form>
    <p class="mt-4 text-sm text-center">Não tem uma conta? <a href="register" class="text-indigo-600 hover:underline">Registre-se</a></p>
  </div>
</div>