<?php
require "../conexao.php";
require "../auth.php";

$livros= $conn->query("SELECT COUNT(*) as total FROM livros");
$totalLivros = $livros->fetch()['total'];

$categorias= $conn->query("SELECT COUNT(*) as total FROM categorias");
$totalCategorias = $categorias->fetch()['total'];

$alunos= $conn->query("SELECT COUNT(*) as total FROM alunos");
$totalAlunos = $alunos->fetch()['total'];

$Consulta_Alunos= $conn->query("
    SELECT id, nome_aluno
    FROM alunos
    ORDER BY id DESC
    LIMIT 4
");
$ultimosAlunos = $Consulta_Alunos->fetchAll();


$Consulta_Livros= $conn->query("
    SELECT id_livro, titulo
    FROM livros
    ORDER BY id_livro DESC
    LIMIT 4
");

$ultimosLivros = $Consulta_Livros->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2D241E] antialiased">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-[#1E1814] text-white shadow-xl border-r border-[#4A3B31] flex flex-col">

            <div class="flex items-center justify-center gap-2 p-6 text-2xl font-bold border-b border-slate-700">
                <img class="w-16 rounded-2xl" src="../imagens/logo.png" alt="Logo">

                <div class="flex flex-col">
                    <span class="text-[#c9a84c]">Biblioteca</span>
                    <span class="text-[#A67C00]">Nexus</span>
                </div>
            </div>

            <nav class="flex flex-col justify-between flex-1 px-4 py-6">

                <ul class="space-y-2">

                    <li>
                        <a href="dashboard.php"
                           class="flex items-center gap-2 p-3 rounded-left-2xl rounded-r-full bg-[#A67C00] font-semibold">
                            <img class="w-6" src="../imagens/dashboard.png" alt="Dashboard">
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="../crud_categorias/categorias.php"
                           class="flex items-center gap-2 p-3 rounded-left-2xl rounded-r-full hover:bg-gray-700 font-semibold">
                            <img class="w-6" src="../imagens/categorias.png" alt="Categorias">
                            <span>Categorias</span>
                        </a>
                    </li>

                    <li>
                        <a href="../crud_alunos/alunos.php"
                           class="flex items-center gap-2 p-3 rounded-r-full font-semibold hover:bg-gray-700 transition">
                            <img class="w-6" src="../imagens/alunos.png" alt="Alunos">
                            <span>Alunos</span>
                        </a>
                    </li>

                    <li>
                        <a href="../crud_livros/livros.php"
                           class="flex items-center gap-2 p-3 rounded-r-full font-semibold hover:bg-gray-700 transition">
                            <img class="w-6" src="../imagens/livros.png" alt="Livros">
                            <span>Livros</span>
                        </a>
                    </li>

                </ul>

                <!-- Logout -->
                <div class="pt-6 border-t border-white/10">
                    <a href="../logout.php"
                       class="flex items-center justify-center gap-2 h-[60px] rounded-lg bg-[#4A0E0E] hover:bg-[#370A0A] text-white font-bold transition">
                        <span>Sair</span>
                        <img class="w-6" src="../imagens/voltar.png" alt="Sair">
                    </a>
                </div>

            </nav>
        </aside>
        
        <main class="flex-1 p-10">
            <header class="relative mb-10">

                <img class="w-full h-[150px] rounded-3xl object-cover border-2 border-[#4A3B31]" src="../imagens/banner_dashboard.png" alt="Banner Livros">

                <div class="absolute inset-0 bg-black/80 rounded-3xl"></div>

                <div class="absolute top-5 left-10">
                    <h1 class="text-4xl font-extrabold text-slate-100 tracking-tight text-[#c9a84c]">
                        OLÁ ADMINISTRADOR!
                    </h1>

                    <p class="mt-3 text-gray-400">
                        Visualize e gerencie a sua biblioteca.
                    </p>
                </div>

            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="../crud_categorias/categorias.php">
                
                <div class="bg-[#2C241E] p-6 rounded-xl shadow-lg hover:scale-105 transition border-2 border-[#A67C00]">
                    <h2 class="text-white text-xl font-bold">Categorias</h2>
                    <p class="text-4xl text-amber-300 font-bold mt-2">
                        <?= $totalCategorias ?>
                    </p>
                </div>
                </a>
            

                <a href="../crud_alunos/alunos.php">
                
                <div class="bg-[#2C241E] p-6 rounded-xl shadow-lg hover:scale-105 transition border-2 border-[#A67C00]">
                    <h2 class="text-white text-xl font-bold">Alunos</h2>
                    <p class="text-4xl text-amber-300 font-bold mt-2">
                        <?= $totalAlunos ?>
                    </p>
                </div>
                </a>
            

                <a href="../crud_livros/livros.php">
                
                <div class="bg-[#2C241E] p-6 rounded-xl shadow-lg hover:scale-105 transition border-2 border-[#A67C00]">
                    <h2 class="text-white text-xl font-bold">Livros</h2>
                    <p class="text-4xl text-amber-300 font-bold mt-2">
                        <?= $totalLivros ?>
                    </p>
                </div>
                </a>
            </div>

    <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-10">
        <div class="flex flex-col gap-5">

        <h2 class="text-xl font-bold text-white mb-4">
            Últimos Alunos Cadastrados
        </h2>

    <table class="w-full text-left overflow-hidden rounded-2xl border-2 border-[#c9a84c] bg-[#1a1311]">
        <thead>
            <tr class="bg-[#C59B27] text-[#0B0C10] font-bold">
                <th class="p-4">ID</th>
                <th class="p-4">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ultimosAlunos as $aluno): ?>
                <tr class="border-2 border-[#3D2B1F] hover:bg-[#1E1814]">
                    <td class="p-4 text-white"><?= $aluno['id'] ?></td>
                    <td class="p-4 text-white"><?= $aluno['nome_aluno'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
        <div class="flex flex-col gap-5">
        <h2 class="text-xl font-bold text-white mb-4">
            Últimos Livros Cadastrados
        </h2>

    <table class="w-full text-left overflow-hidden rounded-2xl border-2 border-[#c9a84c] bg-[#1a1311]">
        <thead>
            <tr class="bg-[#C59B27] text-[#0B0C10] font-bold p-4">
                <th class="p-4">ID</th>
                <th class="p-4">Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ultimosLivros as $livro): ?>
                <tr class="border-2 border-[#3D2B1F] hover:bg-[#1E1814]">
                    <td class="p-4 text-white"><?= $livro['id_livro'] ?></td>
                    <td class="p-4 text-white"><?= $livro['titulo'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

        
</main>

</body>
</html>