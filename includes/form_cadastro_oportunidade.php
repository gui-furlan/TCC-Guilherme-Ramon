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
        <form action="POST">
            <div>
                <!-- Área de atuação -->
                <?php
                include("includes/select-area-atuacao.php");
                ?>
                <div class="clear"></div>
            </div>
            <div>
                <label>Tipo do trabalho: </label>
                <select id="tipo-trabalho" style="float: right; width: 200px; border: 1px solid black">
                    <option value="Efetivo">Efetivo</option>
                    <option value="Estágio">Estágio</option>
                    <option value="Freelance">Freelance</option>
                </select>
                <div class="clear"></div>
            </div>
            <div>
                <label>Local: </label>
                <select id="local" style="float: right; width: 200px; border: 1px solid black">
                    <option value="Home office">Home office</option>
                    <option value="Presencial (endereço da empresa)">Presencial (endereço da empresa)</option>
                </select>
                <div class="clear"></div>
            </div>
            <div>
                <label>Número de vagas: </label>
                <input type="number" name="n_vagas">
                <div class="clear"></div>
            </div>
            <div>
                <label>Faixa salarial: </label>
                <input type="number" name="faixa_salarial">
                <div class="clear"></div>
            </div>
            <hr />
            <div>
                <label>Descreva brevemente sua oportunidade: </label>
                <div class="div-textarea">
                    <textarea rows="2"></textarea>
                </div>
                <div class="clear"></div>
            </div>
            <div>
                <label>Descreva brevemente os requisitos do profissional procurado: </label>
                <div class="div-textarea">
                    <textarea rows="2"></textarea>
                </div>
                <div class="clear"></div>
            </div>
            <hr />
            <div>
                <div class="div_submit">
                    <input type="submit" class="submit">
                </div>
                <div class="clear"></div>
            </div>
        </form>
    </section>
</div>
<!-- Fim includes/form_cadastro_oportunidade.php -->