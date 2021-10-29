
<div class="container">
    <section class="usuario-logado">
        <div>
            <img src="./img/default_user.jpg" width="100px">
            <div>
                <p class="logado-como">Logado como:</p>
                <h3 class="nome-perfil"><?php echo $_SESSION["login"]["nome"]; echo " " . $_SESSION["login"]["sobrenome"] ?></h3>
                <p class="area-perfil"><?= $_SESSION["login"]["area"] ?></p>
                <a class="editar-perfil" href="">Editar perfil</a>
            </div>
            <div class="clear"></div>
        </div>
    </section>
</div>