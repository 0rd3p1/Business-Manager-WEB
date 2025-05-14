<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Registrar-se</h2>
    <form action="user" method="POST" class="space-y-4">
      <div>
        <label for="name" class="block text-sm font-medium">Nome</label>
        <input type="text" name="name" id="name" required class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="email" class="block text-sm font-medium">E-mail</label>
        <input type="email" name="email" id="email" required class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="pswd" class="block text-sm font-medium">Senha</label>
        <input type="password" name="pswd" id="pswd" required class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <div>
        <label for="confirm" class="block text-sm font-medium">Confirmar Senha</label>
        <input type="password" name="confirm" id="confirm" required class="mt-1 w-full p-2 border border-gray-300 rounded">
      </div>
      <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Registrar</button>
    </form>
    <p class="mt-4 text-sm text-center">Já tem uma conta? <a href="login" class="text-indigo-600 hover:underline">Entrar</a></p>
  </div>
</div>
