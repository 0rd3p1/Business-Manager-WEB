<?php

include 'head.php';

if (!isset($_SESSION)) {
    session_start();
}

?>

<form action="actions.php" method="POST">
    <div class="flex place-items-center flex-col mb-90">
        <div class="flex flex-col place-items-center w-100 mt-70 rounded-xl bg-stone-700 shadow-xl text-stone-400">
            <div class="flex flex-col m-7">
                <label class="font-bold" for="email">Email</label>
                <input type="email" name="email" class="rounded-md w-60 bg-stone-500 text-white">
            </div>

            <div class="flex flex-col m-7">
                <label class="font-bold"  for="pswd">Senha</label>
                <input type="password" name="pswd" class="rounded-md w-60 bg-stone-500 text-white">
            </div>

            <?php
            if (isset($_SESSION['errorEmail'])) {
                echo '<h1 class="font-bold text-red-400">' . $_SESSION['errorEmail'] . '</h1>';
                unset($_SESSION['errorEmail']);
            }
            ?>

            <?php
            if (isset($_SESSION['errorPswd'])) {
                echo '<h1 class="font-bold text-red-400">' . $_SESSION['errorPswd'] . '</h1>';
                unset($_SESSION['errorPswd']);
            }
            ?>

            <?php
            if (isset($_SESSION['error'])) {
                echo '<h1 class="font-bold text-red-400">' . $_SESSION['error'] . '</h1>';
                unset($_SESSION['error']);
            }
            ?>

            <div class="flex place-items-center m-7 text-black">
                <button class="bg-slate-500 hover:bg-slate-600 rounded-md mr-3 w-40" type="submit" name="login">Entrar</button>

                <a href="register.php" class="text-center bg-green-400 hover:bg-green-500 rounded-md w-40">Cadastrar</a>
            </div>
        </div>

        <div class="flex flex-row">
            <a href="../" class="text-extrabold mt-10 font-bold">Voltar</a>
        </div>
    </div>
</form>

<?php include 'footer.php' ?>