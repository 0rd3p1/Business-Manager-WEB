<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-stone-950 text-stone-200">
    <header class="bg-stone-900">
        <nav class="flex justify-around py-5">
            <ul class="flex font-bold">
                <li><a href="/" class="font-extrabold text-xl tracking-wide">Business Manager WEB</a></li>
            </ul>
            <ul class="flex font-bold">
                <li><a href="../usuario.view.php" class="hover:underline font-bold"><?php if (!isset($_SESSION['id'])) echo "Login"; else echo "Conta" ?></a></li>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-6">
        <!-- Mostra a rota final -->
        <?php require "views/{$route}.view.php"; ?>
    </main>

    <footer class="bg-stone-950 text-stone-200">

    </footer>
</body>

</html>