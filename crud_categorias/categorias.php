<?php
require "../conexao.php";
require "../auth.php";

$categorias = $conn->query("SELECT * FROM categorias")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
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
                        <a href="../dashboard/dashboard.php"
                           class="flex items-center gap-2 p-3 rounded-left-2xl rounded-r-full hover:bg-gray-700 font-semibold">
                            <img class="w-6" src="../imagens/dashboard.png" alt="Dashboard">
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="categorias.php"
                           class="flex items-center gap-2 p-3 rounded-left-2xl rounded-r-full bg-[#A67C00] font-semibold">
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

        <!-- Conteúdo -->
        <main class="flex-1 p-10">

            <!-- Banner -->
            <header class="relative mb-10">

                <video class="w-full h-[200px] rounded-3xl object-cover border-2 border-[#4A3B31]" autoplay loop muted>
                    <source src="../videos/banner_categorias.mp4" type="video/mp4">
                </video>

                <div class="absolute inset-0 bg-black/80 rounded-3xl"></div>

                <div class="absolute top-5 left-10">
                    <h1 class="text-4xl font-extrabold text-slate-100 tracking-tight">
                        Gerenciamento de <br>
                        <span class="text-[#c9a84c]">Categorias</span>
                    </h1>

                    <p class="mt-3 text-gray-400">
                        Organize e gerencie as categorias que compõem o acervo da biblioteca.
                    </p>
                </div>

            </header>

            <!-- Botão adicionar -->
            <div class="mb-10">
                <a href="criar_categoria.php"
                   class="inline-flex items-center gap-3 px-3 py-4 w-[275px] rounded-2xl bg-[#064E3B] hover:bg-[#043A2B] border border-[#043A2B] text-white font-bold transition">

                    <img class="w-6" src="../imagens/adicionar.png" alt="Adicionar">
                    <span>Adicionar nova categoria</span>
                </a>
            </div>

            <!-- Tabela -->
            <div class="overflow-hidden rounded-2xl border-2 border-[#c9a84c] bg-[#1a1311]">
                <table class="w-full text-center text-[#F8FAFC]">

                    <thead>
                        <tr class="bg-[#C59B27] text-[#0B0C10] font-bold">
                            <th class="py-3">ID</th>
                            <th class="py-3">Categoria</th>
                            <th class="py-3">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($categorias as $categoria): ?>

                            <tr class="border-2 border-[#3D2B1F] hover:bg-[#1E1814] transition">
                                <td class="py-2">
                                    #<?= $categoria['id'] ?>
                                </td>

                                <td class="py-2">
                                    <?= $categoria['categoria'] ?>
                                </td>

                                <td class="py-2">
                                    <div class="flex justify-center gap-3">

                                        <a href="editar_categoria.php?id=<?= $categoria['id'] ?>">
                                            <img class="w-5 hover:scale-110 transition"
                                                 src="../imagens/editar.png"
                                                 alt="Editar">
                                        </a>

                                        <a href="excluir_categoria.php?id=<?= $categoria['id'] ?>"
                                           onclick="return confirm('Tem certeza que deseja excluir este item?')">

                                            <img class="w-5 hover:scale-110 transition"
                                                 src="../imagens/deletar.png"
                                                 alt="Excluir">
                                        </a>

                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </main>
    </div>
</body>

</html>