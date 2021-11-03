<?php
ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);
//session_start();
if (isset($_GET["logout"])) {
    unset($_SESSION['login']);
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    Bem vindo, <span style='font-weight:bolder; color: white'>" . $_SESSION["login"]["username"] . "</span>. Clique para fazer logout.
                </a>
                ";
            }
            ?>

            <div class="clear"></div>
        </div>
    </header>

    <!-- Fim do Cabeçalho -->
    