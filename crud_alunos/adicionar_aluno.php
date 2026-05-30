<?php
require "../conexao.php";
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
    <form action="processamento.php" method="post" class="flex flex-col items-center justify-center gap-5 bg-white rounded-3xl m-10 p-2 shadow-2xl shadow-green-500 w-[900px]">

        <h1 class="text-3xl text-center font-bold m-5 text-green-500 ">ADICIONAR ALUNO</h1>
        
            <label for="nome_aluno" class="font-bold">Nome do aluno:</label>
            <input type="text" name="nome_aluno" placeholder="Nome do aluno" class="border-2 border-black rounded-3xl p-4 w-[800px]" required >
        <div class="flex flex-row gap-5">
            <div class="flex flex-col gap-5">
            <label for="email" class="font-bold">EMAIL:</label>
            <input type="email" name="email" placeholder="Email do aluno" class="border-2 border-black rounded-3xl p-4 w-80" required >
            <label for="telefone" class="font-bold">TELEFONE:</label>
            <input type="number" name="telefone" placeholder="Telefone do aluno" class="border-2 border-black rounded-3xl p-4 w-80" required >
        </div>

        <div class="flex flex-col gap-5">
            <label for="turma" class="font-bold">TURMA:</label>
            <input type="text" name="turma" placeholder="Turma do aluno" class="border-2 border-black rounded-3xl p-4 w-80" required >
            <label for="data_nascimento" class="font-bold">DATA DE NASCIMENTO:</label>
            <input type="date" name="data_nascimento" class="border-2 border-black rounded-3xl p-4 w-80" required >
            </div>
        </div>

        <button class="text-white rounded-3xl bg-green-400 p-4 w-60 hover:bg-green-500" type="submit">Salvar</button>
       
    </form>
        <a href="alunos.php">
            <button class="text-white rounded-3xl bg-red-400 p-4 w-60 hover:bg-red-500 mb-10">
            Sair
            </button>
        </a>

</body>
</html>