<?php

include "includes/header.php";
include "includes/landpage.php";
include "includes/footer.php";

if($_GET["logout"] == true) {
    unset($_SESSION['login']);
    session_destroy();
}