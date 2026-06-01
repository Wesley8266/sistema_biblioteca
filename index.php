<?php
require "conexao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-content flex-col items-center bg-[#2D241E]">
    
<div class="flex items-center justify-center min-h-screen">

<div class="w-[1200px] h-[600px] rounded-3xl flex overflow-hidden shadow-2xl hover:shadow-2xl hover:shadow-[#1A1410] transition-all border-2 border-[#4A3B31]">
    
    <form action="login.php" method="post" class="flex justify-content items-center bg-[#1E1814] rounded-3xl mb-20 gap-4 rounded-3xl w-full h-screen hover:translate-y-[-5px] transition-all">
        <div class="w-1/2 h-full flex items-center justify-center overflow-hidden">
            <img src="imagens/img_inicial.png" class="h-full w-full object-cover rounded-l-3xl">
        </div>

    <div class="w-1/2 flex flex-col items-center justify-center rounded-3xl p-10 gap-6">
        <div class="flex flex-row items-center justify-center gap-2">
            <img src="imagens/logo.png" class="w-20 rounded-2xl">
            <h1 class="text-3xl text-center font-bold m-5 text-[#c9a84c]">LOGIN NA <br> <span class="text-[#A67C00]">BIBLIOTECA</span> </h1>
        </div>

        <div class="flex flex-col gap-2">
            <div class ="flex flex-row items-center gap-2 text-white">
                <img src="imagens/email.png" class="w-6 space-y-2 ">
                <span class="text-[#c9a84c]">Email:</span>
            </div>
                <input type="text" name="email" placeholder="example@gmail.com" class="border-2 border-[#3D2B1F] focus:border-[#A67C00] focus:ring-1 focus:ring-[#A67C00] outline-none rounded-full p-4 w-[400px]" required >
        </div>

        <div class="flex flex-col gap-2">
            <div class ="flex flex-row items-center gap-2 text-white">
                <img src="imagens/senha.png" class="w-6">
                <span class="text-[#c9a84c]">Senha:</span>
            </div>
            <input type="password" name="senha" maxlength="10" placeholder="*****" class="border-2 border-[#3D2B1F] focus:border-[#A67C00] focus:ring-1 focus:ring-[#A67C00] outline-none rounded-full p-4 w-[400px]" required>
        </div>
        <?php 
        if(isset($_GET['msg'])){
            echo "<p class='text-red-500 text-center font-bold'>" . $_GET['msg'] . "</p>";
        } 
        ?>
        <br>
        
        <button type="submit" class="text-white rounded-3xl bg-[#A67C00] p-4 w-[400px] hover:bg-[#8A6600] hover:shadow-2xl hover:translate-y-[-5px]">Entrar</button>
        </div>
    </form>
</body>
</html>

