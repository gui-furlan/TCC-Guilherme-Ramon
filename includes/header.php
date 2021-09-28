<?php
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
            if ($_SESSION['login'] == $email) {
                echo "<a class='header-login' href='login.php'>
                        <h4>Fazer login</h4>
                        </a>";
            } else {
                echo "<a class='header-login' href='?logout=true'>
                        <h4>Fazer logout (".$_SESSION['login']. ")</h4>
                        </a>";
            }
            ?>

            <div class="clear"></div>
        </div>
    </header>

    <!-- Fim do header.php -->