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


    if(empty($categoria)){
        header("location: editar_categoria.php?id=$id&msg=Preencha o campo da categoria");
        exit();
    } else {
        header("location: categorias.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
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
    <main class="flex-1 flex items-center justify-center p-10">
        <form action="" method="post" class="flex flex-col items-center justify-center gap-5 bg-[#1a1311] border border-[#3D2B1F] rounded-3xl p-10 shadow-2xl w-[600px] h-[450px] space-y-6">
            <div class="flex flex-col items-center">
                <img class="w-[40px] h-[40px] bg-[#2D241E] p-2 rounded-full" src="../imagens/editar.png">
                <h1 class="text-3xl text-center font-bold text-white">EDITAR CATEGORIA</h1>
            </div>

        <div class="flex flex-col gap-2 items-start">
            <div class="flex flex-row gap-2">
                <img class="w-5 h-5" src="../imagens/tag.png">
                <label for="categoria" class="font-bold text-[#A67C00]">Nome da categoria:</label>
            </div>
        
                <input type="text" name="categoria" value="<?= $categoria['categoria'] ?>" placeholder="Ficção,Romance, Terror..." class="bg-[#1E1814] border-2 border-[#3D2B1F] focus:outline-none focus:border-[#A67C00] transition-all text-white rounded-3xl p-4 w-[510px]" required>
            
         </div>
            <?php
                if(isset($_GET['msg'])){
                    echo "<p class='text-white text-center font-bold'>" . $_GET['msg'] . "</p>";
                }
            ?>
    
                <div class="flex flex-row justify-content items-center gap-5 border-t-2 border-[#3D2B1F] pt-5">
                    <button type="submit" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#A67C00] hover:bg-[#8A6600] hover p-3 w-[250px]">
                        <span>Atualizar</span>
                        <img class="w-6" src="../imagens/salvar.png">
                    </button>

                    <div class="flex flex-row justify-content items-center gap-5">
                        <a href="categorias.php" class="flex items-center justify-center flex-row text-white font-bold rounded-2xl bg-[#4A0E0E] p-3 w-[250px] hover:bg-[#370A0A]">
                                <span>voltar</span>
                                <img class="w-5 ml-2" src="../imagens/voltar.png">
                        </a>
                    </div>
                </div>
        </form>
    </main>
</body>
</html>