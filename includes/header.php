<?php
    require_once "classes/PessoaFisica.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>TCC</title>
</head>

<body>
    <header>
        <div class="container">
            <a href="index.php" class="header-logo">
                <h1>Logo</h1>
            </a>
            <?php
            if (!isset($_SESSION["login"])) {
                echo "
                <a class='header-login' href='login.php'>
                    Fazer login
                </a>";
            } else {
                echo "
                <a class='header-login' href='?logout=true'>
                    Bem vindo, <span style='font-weight:bolder; color: white'>".$_SESSION["login"]["username"]."</span>. Clique para fazer logout.
                </a>
                ";
            }
            ?>

            <div class="clear"></div>
        </div>
    </header>

    <!-- Fim do header.php -->