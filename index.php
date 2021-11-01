<?php

session_start();

include "includes/header.php";

if(isset($_SESSION['login'])) {
    include "includes/painel.php";
} else {
    include "includes/landpage.html";
}

include "includes/footer.html";