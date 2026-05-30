<?php
require "../conexao.php";
require "../auth.php";

$categorias = $conn->query("SELECT * FROM categorias")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    
<body class="bg-[#2D241E] antialiased">

    <div class="flex min-h-screen">
        
        <aside class="w-64 bg-[#1E1814] text-white flex-shrink-0 shadow-xl border-r border-[#4A3B31]">
            <div class="p-6 text-2xl font-bold text-center border-b border-slate-700">
                <span class="text-[#c9a84c]">Biblioteca</span> <span class="text-[#A67C00]">Nexus</span>
            </div>
            <nav class="mt-6 px-4">
                <ul class="space-y-2">
                    <li>
                        <div class="flex flex-row">
                            <a href="categorias.php">
                                <button class="block p-3 rounded-lg bg-[#A67C00] font-semibold flex items-center justify-start flex-row w-[200px] gap-2">
                                    <img class="w-6" src="../imagens/categorias.png">
                                    <span>Categorias</span>
                                </button>
                            </a>

                    </li>
                    <li>
                        <div class="flex flex-row">
                            <a href="../crud_alunos/alunos.php">
                                <button class="block p-3 rounded-lg font-semibold flex items-center justify-start flex-row w-[200px] gap-2 hover:bg-gray-700">
                                    <img class="w-6" src="../imagens/alunos.png">
                                    <span>Alunos</span>
                                </button>
                            </a>
                    </li>
                    <li>
                        <div class="flex flex-row">
                            <a href="../crud_livros/livros.php">
                                <button class="block p-3 rounded-lg font-semibold flex items-center justify-start flex-row w-[200px] gap-2 hover:bg-gray-700 mb-10">
                                    <img class="w-6" src="../imagens/livros.png">
                                    <span>Livros</span>
                                </button>
                            </a>
                    </li>
                </ul>
                <div class="flex flex-col h-screen justify-end">
                    <div class="border-t border-white/10 mb-10">
                        <a class="block rounded-lg bg-[#4A0E0E] font-semibold hover:bg-[#370A0A] rounded-lg" href="../logout.php">
                            <button class="flex items-center justify-center flex-row text-white font-bold p-1 w-full mt-10 rounded-lg h-[60px]">
                                <span>Sair</span>
                                <img class="w-6" src="../imagens/voltar.png">
                            </button>
                        </a>
                    </div>
                </div>
            </nav>
        </aside>
        
        <main class=" flex-1 p-10">
            <header class="relative mb-10">
                <img class="w-full h-[200px] rounded-3xl object-cover border border-[#3D2B1F]" src="../imagens/banner_categorias.png">     
                <h1 class="absolute top-5 left-10 text-4xl font-extrabold text-slate-100 font-bold tracking-tight">Gerenciamento de <br> <span class="text-[#c9a84c]">Categorias</span></h1>
                <span class="absolute top-[140px] left-10 text-gray-500">Visualize e gerencie o acervo da biblioteca.</span>
            </header>

        <div class="flex flex-row gap-10 mb-10">
                <a href="criar_categoria.php">
                    <button class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#064E3B] p-3 w-60 hover:bg-[#043A2B] border border-[#043A2B]">
                        <img class="w-6" src="../imagens/adicionar.png">
                        <span>Adicionar nova categoria</span>
                    </button>
                </a>
        </div>
    <table class="bg-[#1a1311] rounded-2xl text-center mb-10 w-full overflow-hidden text-[#F8FAFC] border-2 border-[#c9a84c]">
        <tr class="bg-[#C59B27] text-[#0B0C10] font-bold border-2 border-[#c9a84c]">
            <th class="py-3">ID</th>
            <th class="py-3">Categoria</th>
            <th class="py-3">Ações</th>
        </tr>
        <?php foreach ($categorias as $categoria): ?>
        <tr class="border-b border-[#0B0C10] hover:bg-[#1E1814]">
            <td class="py-2"><?= $categoria['id'] ?></td>
            <td class="py-2"><?= $categoria['categoria'] ?></td>
            <td class="py-2">
                <div class="flex justify-center gap-2">
                    <a href="editar_categoria.php?id=<?= $categoria['id'] ?>"><img class="w-5 " src="../imagens/editar.png"></a>

                    <a href="excluir_categoria.php?id=<?= $categoria['id'] ?>" 
                    onclick="return confirm('Tem certeza que deseja excluir este item?')">

                    <img class="w-5 " src="../imagens/deletar.png">
                    </a>
                </div>
            </td>
            
        </tr>
        <?php endforeach; ?>        
    </table>

</body>
</html>