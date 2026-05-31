<?php
require "../conexao.php";
require "../auth.php";
$livros = $conn->query(" 
    SELECT 
    livros.id_livro, 
    livros.titulo, 
    livros.autor, 
    livros.ano_publicacao, 
    categorias.categoria AS id_categoria
    FROM livros
    LEFT JOIN categorias ON livros.id_categoria = categorias.id");

    $livros->execute();
    $livros = $livros->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    
<body class="bg-gray-100 antialiased">

    <div class="flex min-h-screen">
        
        <aside class="w-64 bg-slate-800 text-white flex-shrink-0 shadow-xl">
            <div class="p-6 text-2xl font-bold text-center border-b border-slate-700">
                📚 BiblioSys
            </div>
            <nav class="mt-6 px-4">
                <ul class="space-y-2">
                    <li>
                        <a href="../crud_categorias/categorias.php" class="block p-3 rounded-lg font-semibold">Categorias</a>
                    </li>
                    <li>
                        <a href="../crud_alunos/alunos.php" class="block p-3 rounded-lg font-semibold">Alunos</a>
                    </li>
                    <li>
                        <a href="livros.php" class="block p-3 rounded-lg bg-green-600 font-semibold">Livros</a>
                    </li>
                </ul>

                <div class="mt-auto">
                    <div class="pt-60 border-t border-white/10">
                        <a class="block rounded-lg bg-red-500 font-semibold hover:bg-red-600" href="../index.php">
                            <button class="flex items-center justify-center flex-row text-white font-bold p-1 w-full mt-10 rounded-lg h-[60px]">
                                <span>Sair</span>
                                <img class="w-6" src="../imagens/voltar.png">
                            </button>
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            <header class="mb-10">
                <h1 class="text-4xl font-extrabold text-gray-800">Gerenciamento de Livros</h1>
                <p class="text-gray-500">Visualize e gerencie o acervo da biblioteca.</p>
            </header>

    <div class="flex flex-row gap-10 mb-10">
            <a href="adicionar_livro.php">
            <button class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-green-400 p-3 w-60 hover:bg-green-500">
                <img class="w-6" src="../imagens/adicionar.png">
                <span>Adicionar novo livro</span>
            </button>
            </a>
    </div>
    <table class="bg-white rounded-2xl shadow-2xl shadow-green-500 text-center mb-10 w-full overflow-hidden">
        <tr class="bg-gray-500 text-white font-bold">
            <th class="py-3">ID LIVRO</th>
            <th class="py-3">TITULO</th>
            <th class="py-3">AUTOR</th>
            <th class="py-3">ANO DE PUBLICAÇÃO</th>
            <th class="py-3">CATEGORIA</th>
            <th class="py-3">AÇÕES</th>
        </tr>

        <?php foreach ($livros as $livro): ?>
        <tr class="border-b border-gray-200">
            <td><?= $livro['id_livro'] ?></td>
            <td><?= $livro['titulo'] ?></td>
            <td><?= $livro['autor'] ?></td>
            <td><?= $livro['ano_publicacao'] ?></td>
            <td><?= $livro['id_categoria'] ?></td>
            <td>
                <div class="flex justify-center gap-2">
                    <a href="editar_livro.php?id=<?= $livro['id_livro'] ?>"><img class="w-5 " src="../imagens/editar.png"></a>

                    <a href="excluir_livro.php?id=<?= $livro['id_livro'] ?>" 
                    onclick="return confirm('Tem certeza que deseja excluir este item?')">

                    <img class="w-5" src="../imagens/deletar.png">
                    </a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>        
    </table>

</body>
</html>