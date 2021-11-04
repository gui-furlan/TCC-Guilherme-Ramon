<!-- Inicio includes/form_cadastro_oportunidade.php -->
<div class="container">

    <!-- Área do usuário logado -->
    <?php
    include("includes/usuario_logado.php");
    ?>

    <!-- Formulário de cadastro -->
    <section class="formulario">
        <h1>Cadastrar uma oportunidade</h1>
        <hr />
        <form method="POST">
            <div>
                <label>Título:</label>
                <input type="text" name="titulo" maxlength="255">
            </div>
            <div>
                <!-- Área de atuação -->
                <?php
                include("includes/select-area-atuacao.html");
                ?>
                <div class="clear"></div>
            </div>
            <div>
                <label>Tipo do trabalho: </label>
                <select name="tipo_trabalho" style="width: 100%; border: 1px solid black">
                    <option value="Efetivo">Efetivo</option>
                    <option value="Estágio">Estágio</option>
                    <option value="Freelance">Freelance</option>
                </select>
                <div class="clear"></div>
            </div>
            <div>
                <label>Local: </label>
                <select name="local" style="width: 100%; border: 1px solid black">
                    <option value="Home office">Home office</option>
                    <option value="Presencial">Presencial (endereço da empresa)</option>
                </select>
                <div class="clear"></div>
            </div>
            <div>
                <label>Número de vagas: </label>
                <input type="number" name="n_vagas" max="100">
            </div>
            <div>
                <label>Faixa salarial: </label>
                <input type="number" name="faixa_salarial" max="50000">
            </div>
            <hr />
            <div>
                <label>Descreva brevemente sua oportunidade: </label>
                <div class="div-textarea">
                    <textarea name="descricao" rows="3" maxlength="700"></textarea>
                </div>
            </div>
            <div>
                <label>Descreva brevemente os requisitos do profissional procurado: </label>
                <div class="div-textarea">
                    <textarea name="requisitos" rows="3" maxlength="700"></textarea>
                </div>
            </div>
            <hr />
            <div>
                <div class="div_submit">
                    <input type="submit" class="submit">
                </div>
            </div>
        </form>
    </section>
</div>
<script>
    document.getElementsByTagName("body")[0].style.backgroundColor = "#EBEBEB"
</script>
<!-- Fim includes/form_cadastro_oportunidade.php -->