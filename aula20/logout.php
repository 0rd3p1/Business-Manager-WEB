<?php

include 'head.php';
include 'protectUser.php';


if (!isset($_SESSION)) {
    session_start();
}

?>

<form action="actions.php" method="POST">
    <div class="flex place-items-center flex-col mb-100 text-stone-400 font-bold">
        <div class="flex flex-col place-items-center bg-stone-700 w-100 mt-90 rounded-xl shadow-xl">
            <p class="text-xl m-7 text-center">
                Voce deseja mesmo sair da sua conta?
            </p>

            <div class="flex place-items-center m-7">
                <button class="bg-green-400 hover:bg-green-500 rounded-md w-30 mr-3 text-black" type="submit" name="logout">Sim</button>
                <button class="bg-red-400 hover:bg-red-500 rounded-md w-30 ml-3 text-black" type="submit" name="null">Não</button>
            </div>
        </div>
    </div>
</form>

<?php include 'footer.php' ?>