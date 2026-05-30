<?php
require "../conexao.php";
require "../auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex flex-col justify-content items-center bg-[#1E1814]">
    <form action="processamento.php" method="post" class="flex flex-col items-center justify-center gap-5 bg-[#1E1814] border border-[#3D2B1F] rounded-3xl m-20 p-10 shadow-2xl w-[600px] h-[400px] space-y-6">
            <div class="flex flex-col items-center">
                <img class="w-[40px] h-[40px]" src="../imagens/adicionar.png">
                <h1 class="text-3xl text-center font-bold text-white ">CRIAR CATEGORIA</h1>
                
            </div>

        <div class="space-y-2">
            <label for="categoria" class="font-bold text-[#C6C6D0]">Nome da categoria:</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500">
                    <img class="w-5 h-5" src="../imagens/tag.png">
                </span>

                <input type="text" name="categoria" placeholder="Ficção,Romance, Terror..." class="bg-[#0B0C10] border-2 border-[#3D2B1F] focus:outline-none focus:border-[#A67C00] transition-all text-white rounded-3xl p-4 w-[500px] pl-11" required >
            </div>
        </div>

        <div class="gap-[40px]">
            <div class="flex flex-row justify-content items-center gap-5">
                <button type="submit" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#A67C00] hover:bg-[#8A6600] hover p-3 w-[500px]">
                    <span>Salvar</span>
                    <img class="w-6" src="../imagens/salvar.png">
                </button>
            </div>

            <div class="flex flex-row justify-content items-center gap-5">
            <a href="categorias.php" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#4A0E0E] p-3 w-[500px] hover:bg-[#370A0A]">
                <!-- <button class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#4A0E0E] p-3 w-[500px] hover:bg-[#370A0A]"> -->
                    <span>voltar</span>
                    <img class="w-5 ml-2" src="../imagens/voltar.png">
                <!-- </button> -->
            </a>
        </div>

    </form>

   
</body>
</html>