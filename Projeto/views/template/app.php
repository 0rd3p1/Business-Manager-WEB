<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-stone-950 text-stone-200">
    <header class="bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between px-8 py-4">
            <a href="/" class="font-extrabold text-xl tracking-wide">Lolja</a>
            <ul class="flex space-x-4 font-bold">
                <li><a href="/" class="text-lime-500">Explorar</a></li>
            </ul>
            <ul>
                <a href="../usuario.view.php" class="hover:underline font-bold"><?php if (!isset($_SESSION['id'])) echo "Login"; else echo "Conta" ?></a>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-6">
        <!-- Mostra a rota final -->
        <?php require "views/{$view}.view.php"; ?>
    </main>
</body>

</html>