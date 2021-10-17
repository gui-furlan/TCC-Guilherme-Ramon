
<!-- painel.php -->

<?php
    include "includes/usuario_logado.php";
    if ($_SESSION["login"]["tipo"] == "J") {
        //include alguma coisa
    }
?>


<div class="container">
    <section class="form-pesquisa">
        <form>
            <input type="submit" value="Pesquisar">
            <input type="text" name="pesquisa">
        </form>
    </section>
    <div class="clear"></div>

    <section class="resultados">

    </section>
</div>

<script>document.getElementsByTagName("body")[0].style.backgroundColor="#EBEBEB";document.getElementsByTagName("header")[0].style.borderBottom="2px solid var(--corAzul)"</script>
<!-- fim painel.php -->