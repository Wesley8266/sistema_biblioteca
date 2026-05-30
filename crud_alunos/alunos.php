<?php
require "../conexao.php";
$dados = $conn->query("SELECT * FROM alunos_cadastrados")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Alunos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 antialiased">
    <div class="flex min-h-screen">

        <aside class="w-64 bg-[#1E1814] text-white shadow-xl border-r border-[#4A3B31] flex-shrink-0">

            <div class="flex items-center justify-center gap-2 p-6 text-2xl font-bold border-b border-slate-700">
                <img class="w-16 rounded-2xl" src="../imagens/logo.png" alt="Logo">

                <div class="flex flex-col">
                    <span class="text-[#c9a84c]">Biblioteca</span>
                    <span class="text-[#A67C00]">Nexus</span>
                </div>
            </div>

            <nav class="flex flex-col justify-between h-[calc(100vh-112px)] px-4 py-6">
                <ul class="space-y-2">

                    <li>
                        <a href="../crud_categorias/categorias.php"
                           class="flex items-center gap-2 p-3 rounded-lg font-semibold hover:bg-gray-700 transition">
                            <img class="w-6" src="../imagens/categorias.png" alt="Categorias">
                            <span>Categorias</span>
                        </a>
                    </li>

                    <li>
                        <a href="alunos.php"
                           class="flex items-center gap-2 p-3 rounded-lg font-semibold bg-[#A67C00]">
                            <img class="w-6" src="../imagens/alunos.png" alt="Alunos">
                            <span>Alunos</span>
                        </a>
                    </li>

                    <li>
                        <a href="../crud_livros/livros.php"
                           class="flex items-center gap-2 p-3 rounded-lg font-semibold hover:bg-gray-700 transition">
                            <img class="w-6" src="../imagens/livros.png" alt="Livros">
                            <span>Livros</span>
                        </a>
                    </li>

                </ul>

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

            <header class="mb-10">
                <h1 class="text-4xl font-extrabold text-gray-800">
                    Gerenciamento de Alunos
                </h1>
                <p class="text-gray-500">
                    Visualize e gerencie os alunos cadastrados.
                </p>
            </header>

            <div class="mb-10">
                <a href="adicionar_aluno.php"
                   class="inline-flex items-center gap-2 px-4 py-3 rounded-2xl bg-green-400 hover:bg-green-500 text-white font-bold transition">
                    <img class="w-6" src="../imagens/adicionar.png" alt="Adicionar">
                    <span>Adicionar novo aluno</span>
                </a>
            </div>

            <div class="overflow-hidden bg-white rounded-2xl shadow-2xl shadow-green-500">
                <table class="w-full text-center">

                    <thead>
                        <tr class="bg-gray-500 text-white font-bold">
                            <th class="py-3">ID</th>
                            <th class="py-3">Nome e Contato</th>
                            <th class="py-3">Turma</th>
                            <th class="py-3">Data de Nascimento</th>
                            <th class="py-3">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dados as $aluno): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100 transition">

                                <td>#<?= $aluno['id'] ?></td>

                                <td>
                                    <div class="flex flex-col items-center">
                                        <span><?= $aluno['nome_aluno'] ?></span>
                                        <span><?= $aluno['email'] ?></span>
                                        <span><?= $aluno['telefone'] ?></span>
                                    </div>
                                </td>

                                <td><?= $aluno['turma'] ?></td>
                                <td><?= $aluno['data_nascimento'] ?></td>

                                <td>
                                    <div class="flex justify-center gap-3">
                                        <a href="editar_aluno.php?id=<?= $aluno['id'] ?>">
                                            <img class="w-5 hover:scale-110 transition"
                                                 src="../imagens/editar.png"
                                                 alt="Editar">
                                        </a>

                                        <a href="excluir_aluno.php?id=<?= $aluno['id'] ?>"
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