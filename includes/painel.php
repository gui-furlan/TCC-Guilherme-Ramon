<!-- painel.php -->

<div class="container">
    <section class="usuario_logado">
        <div>
            <img src="./img/default_user.jpg" width="100px">
            <div>
                <p class="logado_como">Logado como:</p>
                <h3 class="nome_perfil"><?php echo $_SESSION['login']; ?></h3>
                <p class="area_perfil">Área de destaque</p>
                <a class="editar_perfil" href="">Editar perfil</a>
            </div>
            <div class="clear"></div>
        </div>
    </section>
</div>
<section>

</section>

<!-- fim painel.php -->