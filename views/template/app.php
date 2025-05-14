<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600"><a href="/">Business Manager WEB</a></h1>
            <nav class="space-x-6">
                <?php if (isset($_SESSION['id'])) { ?>
                    <a href="product" class="text-gray-600 hover:text-blue-600">Produtos</a>
                    <a href="business" class="text-gray-600 hover:text-blue-600">Empresas</a>
                    <a href="user" class="text-gray-600 hover:text-blue-600">Conta</a>
                <?php } else { ?>
                    <a href="register" class="text-gray-600 hover:text-blue-600">Registrar-se</a>
                    <a href="login" class="text-gray-600 hover:text-blue-600">Entrar</a>
                <?php } ?>
            </nav>
        </div>
    </header>

    <main>
        <?php require "views/{$route}.view.php"; ?>
    </main>

    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-sm">
            <p>&copy; 2025 Business Manager WEB. Todos os direitos reservados.</p>
            <div class="space-x-4 mt-2 md:mt-0">
                <a href="#" class="hover:underline">Privacidade</a>
                <a href="#" class="hover:underline">Termos</a>
                <a href="#" class="hover:underline">Ajuda</a>
            </div>
        </div>
    </footer>
</body>

</html>