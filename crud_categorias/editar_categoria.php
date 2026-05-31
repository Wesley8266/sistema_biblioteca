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
<body class="flex flex-col justify-content items-center bg-[#2D241E]">
    <form action="" method="post" class="flex flex-col items-center justify-center gap-5 bg-[#1a1311] border border-[#3D2B1F] rounded-3xl m-20 p-10 shadow-2xl w-[600px] h-[400px] space-y-6">
        <h1 class="text-3xl text-center font-bold m-5 text-[#C6C6D0]">EDITAR CATEGORIA</h1>
        <div class="space-y-2">
            <label for="categoria" class="font-bold text-[#C6C6D0]">Nome da categoria:</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">
                        <img class="w-5 h-5" src="../imagens/tag.png">
                    </span>
                    <input type="text" name="categoria" value="<?= $categoria['categoria'] ?>" placeholder="Nome da categoria" class="bg-[#1E1814] border-2 border-[#3D2B1F] focus:outline-none focus:border-[#A67C00] transition-all text-white rounded-3xl p-4 w-[500px] pl-11" required >
            </div>
        </div>
    
        <div class="flex flex-col justify-content items-center gap-5">
                    <button type="submit" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#A67C00] hover:bg-[#8A6600] hover p-3 w-[500px]">
                        <span>Atualizar</span>
                        <img class="w-6" src="../imagens/salvar.png">
                    </button>

                    <div class="flex flex-row justify-content items-center gap-5">
                        <a href="categorias.php" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#4A0E0E] p-3 w-[500px] hover:bg-[#370A0A]">
                                <span>voltar</span>
                                <img class="w-5 ml-2" src="../imagens/voltar.png">
                        </a>
                    </div>
        </div>
    </form>
</body>
</html>