<?php

/**
 * Verifica se o usuário não está logado e se não teve erro com a conexão com o banco
 * Se não, é direcionado pro index.php
 * Se estiver, prossegue
 */
require "conexao.php";
session_start();
if (!isset($_SESSION["login"]) || ($mysqli->connect_error)) {
    header("Location: index.php");
    exit();
}

/**
 * Inclui o cabeçalho e a caixa de usuário logado
 */
require "includes/header.php";
require "includes/usuario_logado.php";
if ($_SESSION["login"]["tipo"] == "J") {
    require "includes/botoes_juridico.html";
}

/**
 * Seleciona a oportunidade no banco
 */
$c = $_GET["c"];
$query = "SELECT *, nome_pj FROM oportunidade 
JOIN pessoa_juridica ON pk_pessoa_juridica = fk_pessoa_juridica
WHERE codigo_opo = $c;";
$row = $mysqli->query($query)->fetch_assoc();
?>

<!-- oportunidade.php -->

<div class="container">
    <section class="view">

        <div class="titulo-view">
            <h2><?= $row["titulo_opo"] ?></h2>
        </div>
        <hr />
        <div class="conteudo-view">
            <div class="descricao-view">
                <h3>Área do profissional procurado:</h3>
                <p><?= $row["area_opo"] ?></p>

                <h3>Tipo do contrato:</h3>
                <p><?= $row["contrato_opo"] ?></p>

                <h3>Número de vagas:</h3>
                <p><?= $row["numero_vagas_opo"] ?></p>

                <h3>Faixa salarial:</h3>
                <p>R$ <?= $row["faixa_salarial_opo"] ?></p>

                <h3>Descrição da vaga:</h3>
                <p><?= $row["descricao_opo"] ?></p>

                <h3>Requisitos da vaga:</h3>
                <p><?= $row["requisitos_opo"] ?></p>
            </div>

            <div class="empresa-view">
                <img style="width: 150px" src="img/default_user.jpg">
                <h3 class="nome-empresa">Sobre <a href=""><?= $row["nome_pj"] ?></a></h3>
                <p><?= $row["bio_pj"] ?></p>
            </div>
        </div>
        <div class="clear"></div>
        <hr>
        <div class="botoes-view">
            <?php
            if ($_SESSION["login"]["tipo"] == "F") {
                echo "
                        <button class='candidatar'>
                            <a href=''><i class='fa fa-pencil-square-o' aria-hidden='true'></i> &ThinSpace; Candidatar-se</a>
                        </button>
                ";
            } else {
                if ($_SESSION["login"]["nome"] == $row["nome_pj"]) {
                    echo "
                        <button class='excluir'>
                        <a  href=''><i class='fa fa-trash-o' aria-hidden='true'></i> &ThinSpace; Excluir oportunidade</a>
                        </button>
                    ";
                    echo "
                        <button class='candidatos'>
                        <a  href=''><i class='fa fa-id-card-o' aria-hidden='true'></i> &ThinSpace; Ver candidatos</a>
                        </button>
                    ";
                }
            }
            ?>
        </div>
    </section>
</div>
<script>
    document.getElementsByTagName("body")[0].style.backgroundColor = "#EBEBEB";
</script>

<?php
require "includes/footer.html";
?>

<!-- Fim oportunidade.php -->