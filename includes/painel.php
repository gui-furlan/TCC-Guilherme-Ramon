
<!-- Painel -->

<?php
    include "includes/usuario_logado.php";
    if ($_SESSION["login"]["tipo"] == "J") {
        //include os botões de cadastro de oportunidade e gerenciamento de oportunidade ("Ver vagas" ou algo assim)
        include "includes/botoes_juridico.html";
    }
    include "form_pesquisa.html";

?>

<script>document.getElementsByTagName("body")[0].style.backgroundColor="#EBEBEB";document.getElementsByTagName("header")[0].style.borderBottom="2px solid var(--corAzul)"</script>
<!-- Fim Painel -->