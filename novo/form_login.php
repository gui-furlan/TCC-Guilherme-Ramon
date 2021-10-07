<!-- form_login.php -->
<!-- includes/form_login.php-->
<div class="container">
    <div class="form-login">
        <section class="formulario">
            <h2>Faça seu Login</h2>
            <hr />
            <form method="POST">
                <div>
                    <label>E-mail</label>
                    <input class="formulario-login" type="email" name="email" placeholder="Digite seu e-mail" autocomplete="off">
                    <div class="clear"></div>
                </div>
                <div>
                    <label>Senha</label>
                    <input class="formulario-login" type="password" name="senha" placeholder="Digite sua senha">
                    <div class="clear"></div>
                </div>

                <hr />
                <div class="formulario-h3">
                    <h3>Tipo de Conta</h3>
                </div>
                <hr />
                <div class="formulario-radio">
                    <label>
                        Conta Pessoa Física <input type="radio" name="tipo_conta" value="fisica" checked>
                    </label>

                    <label>
                        Conta Pessoa Jurídica <input type="radio" name="tipo_conta" value="juridica">
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
</div>
<!-- Fim includes/from_login.php -->