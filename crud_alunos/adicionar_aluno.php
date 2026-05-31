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

<body class="flex flex-col justify-content items-center bg-[#2D241E]">

    <form action="processamento.php" method="post"
        class="flex flex-col items-center justify-center gap-5 bg-[#1a1311] border-2 border-[#3D2B1F] rounded-2xl m-10 p-2 shadow-2xl w-[900px] text-[#F8FAFC]">

        <div class="flex flex-col items-center mt-5">
            <img class="w-[60px] h-[60px] bg-[#2D241E] p-4 rounded-full" src="../imagens/adicionar_aluno.png">
            <h1 class="text-3xl text-center font-bold m-5 text-[#F8FAFC]">
            ADICIONAR ALUNO
            </h1>

        <div class="flex align-items items-start flex-col gap-5">
            <div class="flex flex-row gap-2">
                <img class="w-6" src="../imagens/pessoa.png">
                <label for="nome_aluno" class="font-bold text-[#A67C00]">Nome do aluno:</label>
            </div>
            <input
                type="text"
                name="nome_aluno"
                placeholder="Nome do aluno"
                class="border-2 border-black rounded-2xl p-4 w-[820px] text-[#F8FAFC] bg-[#1E1814]"
                required>
        </div>

        <div class="flex flex-row gap-5 mt-5">
            <div class="flex flex-col gap-5">
                <div class="flex flex-row gap-2">
                    <img class="w-6" src="../imagens/email.png">
                    <label for="email" class="font-bold text-[#A67C00]">EMAIL:</label>
                </div>
                <input
                    type="email"
                    name="email"
                    placeholder="Email do aluno"
                    class="border-2 border-black rounded-2xl p-4 w-[400px] text-[#F8FAFC] bg-[#1E1814]"
                    required>

                <div class="flex flex-row gap-2">
                    <img class="w-6" src="../imagens/telefone.png">
                    <label for="telefone" class="font-bold text-[#A67C00]">TELEFONE:</label>
                </div>
                <input
                    type="number"
                    name="telefone"
                    placeholder="Telefone do aluno"
                    class="border-2 border-black rounded-2xl p-4 w-[400px] text-[#F8FAFC] bg-[#1E1814]"
                    required>
            </div>
            
            <div class="flex flex-col gap-5">
                <div class="flex flex-row gap-2">
                    <img class="w-6" src="../imagens/turma.png">
                    <label for="turma" class="font-bold text-[#A67C00]">TURMA:</label>
                </div>
                <input
                    type="text"
                    name="turma"
                    placeholder="Turma do aluno"
                    class="border-2 border-black rounded-2xl p-4 w-[400px] text-[#F8FAFC] bg-[#1E1814]"
                    required>

                <div class="flex flex-row gap-2">
                    <img class="w-6" src="../imagens/data.png">
                    <label for="data_nascimento" class="font-bold text-[#A67C00]">DATA DE NASCIMENTO:</label>
                </div>
                <input
                    type="date"
                    name="data_nascimento" 
                    class="border-2 border-black rounded-2xl p-4 w-[400px] text-[#F8FAFC] bg-[#1E1814]" 
                    required>
            </div>
        </div>
        <br>
                <div class="flex flex-row justify-content items-center gap-5 mb-5 border-t border-[#3D2B1F] pt-5">
                    <button type="submit" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#A67C00] hover:bg-[#8A6600] hover p-3 w-[400px]">
                        <span>Salvar</span>
                        <img class="w-6" src="../imagens/salvar.png">
                    </button>

                    <div class="flex flex-row justify-content items-center gap-5">
                        <a href="alunos.php" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#4A0E0E] p-3 w-[400px] hover:bg-[#370A0A]">
                                <span>voltar</span>
                                <img class="w-5 ml-2" src="../imagens/voltar.png">
                        </a>
                </div>
    </form>

</body>
</html>