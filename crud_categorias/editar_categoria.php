<?php
require "../conexao.php";
require "../auth.php";

$id = $_GET['id'];

$editar = $conn->prepare("SELECT * FROM categorias WHERE id = ?");
$editar->execute([$id]);
$categoria = $editar->fetch();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $categoria = $_POST['categoria'];

    $edit = $conn->prepare("UPDATE categorias SET categoria = ? WHERE id = ?");
    $edit->execute([$categoria, $id]);

    header("location: categorias.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex flex-col justify-content items-center bg-gray-200" style="background-image: url('../imagens/fundo_sistema.png'); background-size: cover;">
    <form action="" method="post" class="flex flex-col items-center justify-center gap-5 bg-white rounded-3xl m-20 p-10 shadow-2xl shadow-green-500 w-[400px]">
        <h1 class="text-3xl text-center font-bold m-5 text-green-500 ">EDITAR CATEGORIA</h1>

            <input type="text" name="categoria" value="<?= $categoria['categoria'] ?>" placeholder="Nome da categoria" class="border-2 border-black rounded-3xl p-4 w-60" required >
        </div>
        <button class="text-white rounded-3xl bg-green-400 p-4 w-60 hover:bg-green-500" type="submit">Salvar</button>
    </form>
        <a href="categorias.php">
            <button class="text-white rounded-3xl bg-red-400 p-4 w-60 hover:bg-red-500 mb-10">
            Sair
            </button>
        </a>
</body>
</html>