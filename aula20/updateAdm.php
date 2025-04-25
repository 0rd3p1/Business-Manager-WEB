<?php

include 'head.php';
include 'protectAdm.php';
include 'protectUser.php';

if (!isset($_SESSION)) {
    session_start();
}

?>

<form action="../actions.php" method="POST">

    <input type="text" hidden name="id" value="<?= $_GET['id']; ?>">

    <div class="flex place-items-center flex-col mb-70">
        <div class="flex flex-col place-items-center bg-stone-300 w-100 mt-50 rounded-xl shadow-xl bg-stone-700 text-stone-400">
            <div class="flex flex-col m-7">
                <label class="font-bold" for="nome">Nome</label>
                <input type="text" name="name" class="rounded-md w-60 bg-stone-500 text-white">
            </div>

            <div class="flex flex-col m-7">
                <label class="font-bold" for="email">Email</label>
                <input type="email" name="email" class="rounded-md w-60 bg-stone-500 text-white">
            </div>
            
            <div class="flex flex-col m-7">
                <label class="font-bold" for="pswd">Senha</label>
                <input type="password" name="pswd" class="rounded-md w-60 bg-stone-500 text-white">
            </div>

            <div class="flex flex-col m-7">
                <label class="font-bold" for="idAdm">Adm = 1 || User = 0</label>
                <input type="text" name="idAdm" class="rounded-md w-60 bg-stone-500 text-white">
            </div>

            <?php
            if (isset($_SESSION['errorName'])) {
                echo '<h1 class="font-bold text-red-400">' . $_SESSION['errorName'] . '</h1>';
                unset($_SESSION['errorName']);
            }
            ?>

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

            <div class="flex place-items-center m-7">
                <button class="bg-slate-500 hover:bg-slate-600 rounded-md w-40 text-black" type="submit" name="updateUser">Editar</button>
            </div>
        </div>

        <a href="../" class="text-extrabold mt-10 font-bold">Voltar</a>
    </div>
</form>

<?php include 'footer.php' ?>