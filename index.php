<?php

session_start();

if($_GET["logout"] == true) {
    unset($_SESSION['login']);
    session_destroy();
}

include "includes/header.php";

if(isset($_SESSION['login'])) {
    include "includes/painel.php";
} else {
    include "includes/landpage.php";
}

include "includes/footer.php";