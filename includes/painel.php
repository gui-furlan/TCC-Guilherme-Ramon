
<!-- Painel -->

<?php
    /**
     * Chama a caixa com as informações de usuário logado
     */
    require "includes/usuario_logado.php";
    
    /**
     * Se for jurídico, chama os botoẽs "Minhas Oportunidades" e "Cadastrar Oportunidade"
     */
    if ($_SESSION["login"]["tipo"] == "J") {
        include "includes/botoes_juridico.html";
    }

    /**
     * Chama a barra de busca  
     */ 
    include "form_pesquisa.html";

    /**
     * Chama os resultados
     */ 
    include "includes/resultados.php";

?>

<script>document.getElementsByTagName("body")[0].style.backgroundColor="#EBEBEB";document.getElementsByTagName("header")[0].style.borderBottom="2px solid var(--corAzul)"</script>
<!-- Fim Painel -->