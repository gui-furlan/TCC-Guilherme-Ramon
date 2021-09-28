<?php 

session_start();

if (isset($_GET['logout'])) {
    unset($_SESSION['login']);
    session_destroy();
    header('Location: index.php');
}

if (isset($_SESSION['login'])) {
    include("includes/header.php");
    die ("Logado como" . $_SESSION['login']);
} else {
    include("includes/header.php");
    include("includes/conteudoindex.php"); 
    include("includes/footer.php");
}

?>