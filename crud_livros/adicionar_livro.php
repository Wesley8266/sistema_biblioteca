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
<body class="flex flex-col justify-content items-center bg-[#1E1814]"
    style="background-image: url('../imagens/fundo_sistema.png'); background-size: cover;">

    <form action="processamento.php" method="post"
        class="flex flex-col items-center justify-center gap-5 bg-[#1a1311] border-2 border-[#3D2B1F] rounded-2xl m-10 p-2 shadow-2xl w-[700px] text-[#F8FAFC]">

            <div class="flex flex-col items-center">
                <img class="w-[60px] h-[60px] bg-[#2D241E] p-2 rounded-full" src="../imagens/add_book.png">
                <h1 class="text-3xl text-center font-bold text-white">ADICIONAR LIVRO</h1>
            </div>

        <div class="flex flex-row gap-20">

            <div class="flex flex-col gap-5">   

                <div class="flex flex-row gap-2">
                    <label for="titulo_livro">Título:</label>
                </div>

                <input
                    type="text"
                    name="titulo"
                    id="titulo_livro"
                    placeholder="Título do livro"
                    class="border-2 border-black rounded-3xl p-4 w-60 text-white bg-[#1E1814]"
                    required>

                <div class="flex flex-row gap-2">
                    <label for="autor_livro">Autor:</label>
                </div>

                <input
                    type="text"
                    name="autor"
                    id="autor_livro"
                    placeholder="Autor do livro"
                    class="border-2 border-black rounded-3xl p-4 w-60 text-white bg-[#1E1814]"
                    required>

            </div>

            <div class="flex flex-col gap-5">

                <div class="flex flex-row gap-2">
                    <label for="ano_publicacao">Ano de Publicação:</label>
                </div>

                <input
                    type="number"
                    name="ano_publicacao"
                    id="ano_publicacao"
                    placeholder="Ano de publicação"
                    class="border-2 border-black rounded-3xl p-4 w-60 text-white bg-[#1E1814]"
                    required>

                <div class="flex flex-row gap-2">
                    <label for="id_categoria">Categoria:</label>
                </div>

                <select
                    name="id_categoria"
                    id="id_categoria"
                    class="border-2 border-black rounded-3xl p-4 w-60 text-white bg-[#1E1814]"
                    required>

                    <option value="" class="text-white bg-[#1E1814]">Selecione uma categoria</option>

                    <?php
                    $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();

                    foreach ($categorias as $categoria) {
                        echo "<option class='text-white bg-[#1E1814]' value='{$categoria['id']}'>{$categoria['categoria']}</option>";
                    }
                    ?>

                </select>

            </div>

        </div>

        <div class="flex flex-row justify-content items-center gap-5 mb-5 border-t border-[#3D2B1F] pt-5">

            <button
                type="submit"
                class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#A67C00] hover:bg-[#8A6600] hover p-3 w-[280px]">

                <span>Salvar</span>
                <img class="w-6" src="../imagens/salvar.png">

            </button>

            <div class="flex flex-row justify-content items-center gap-5">

                <a
                    href="livros.php"
                    class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#4A0E0E] p-3 w-[280px] hover:bg-[#370A0A]">

                    <span>Voltar</span>
                    <img class="w-5 ml-2" src="../imagens/voltar.png">

                </a>

            </div>

        </div>

    </form>
</body>

</html>