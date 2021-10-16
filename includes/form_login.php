<!-- form_login.php -->
<!-- includes/form_login.php-->
<div class="container">
    <section class="formulario">
        <h2>Faça seu Login</h2>
        <hr />
        <form method="POST">
            <div>
                <label>Nome de usuário:</label><br />
                <input class="formulario-login" type="text" name="username" placeholder="Requerido">
                <div class="clear"></div>
            </div>
            <div>
                <label>Senha:</label><br />
                <input class="formulario-login" type="password" name="senha" placeholder="Digite sua senha">
                <div class="clear"></div>
            </div>

            <hr />
            <div class="formulario-h3">
                <h3>Tipo de Conta</h3>
            </div>
            <div class="formulario-radio">
                <label>
                    Pessoa Física <input type="radio" name="tipo_conta" value="f" checked>
                </label>

                <label>
                    Pessoa Jurídica <input type="radio" name="tipo_conta" value="j">
                </label>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

            <hr />
            <div class="div_submit">
                <input name="enviar" value="Entrar" class="submit" type="submit">
                <div class="clear"></div>
            </div>
        </form>
    </section>
    <div class="clear"></div>
</div>
<script>
    document.getElementsByTagName("body")[0].style.backgroundColor = "#EBEBEB"
</script>
<!-- Fim includes/from_login.php -->