<?php

ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Conexão com o banco de dados, verificando erros
 * Se tiver erro, lança erro e para a execução
 * Se não, prossegue
 */
require_once "conexao.php";
if ($mysqli->connect_error) {
    die("Não foi possível conectar ao banco de dados: " . $mysqli->connect_error);
}

/**
 * Inicia a sessão
 */
session_start();

/**
 * Verifica se o usuário está logado OU não é pessoa jurídica
 * Se não, redireciona para index.php
 */
if (!isset($_SESSION["login"]) || ($_SESSION["login"]["tipo"] != "J")) {
    header("Location: index.php");
    exit;
}

/**
 * Verifica se o formulário foi preenchido com as principais informações
 * Se sim, prossegue para o cadastro
 * Se não, carrega o formulário
 */
if (
    isset($_POST["titulo"]) && isset($_POST["area"]) && isset($_POST["tipo_trabalho"]) && isset($_POST["local"])
    && isset($_POST["n_vagas"]) && isset($_POST["faixa_salarial"])
) {
    /**
     * Estabelece o dono da oportunidade:
     * ... o usuário de pessoa jurídica logado no momento.
     */
    $criador = $_SESSION["login"]["username"];

    /**
     * Verifica se a vaga é presencial ou Home Office
     * Se for presencial, então:
     * - O local da oportunidade será o local da empresa
     * - Busca no banco pela localização da empresa
     * - Constrói uma string $local que armaneza no seguinte modelo:
     * - - "Municipio, Estado"
     * 
     * Se não for presencial, então o local fica como "Home Office"
     */
    if ($_POST["local"] == "Presencial") {
        $query = "SELECT municipio_pj, estado_pj FROM pessoa_juridica WHERE username_pj IN ('$criador');";
        $result = $mysqli->query($query)->fetch_assoc();
        $local = $result["municipio_pj"];
        $local .= ", " . $result["estado_pj"];
    } else {
        $local = "Home Office";
    }

    /**
     * Cria o código da oportunidade utilizando a data e hora do sistema
     * No formato "YmdHis" + um int random entre 0 e 9
     * Retorna um ano (4 dígitos), mês (2 díg.), dia do mês (2 díg.),
     * ... hora (2 díg. formato 24 hrs), minutos (2 díg.) e segundos (2 díg.)
     */
    $codigo = date("YmdHis");
    $codigo .= rand(0, 9);

    /**
     * Recuperar no banco a PK da pessoa jurídica criadora da oportunidade
     */
    $query = "SELECT pk_pessoa_juridica FROM pessoa_juridica WHERE username_pj IN ('$criador');";
    $pk = $mysqli->query($query)->fetch_assoc()["pk_pessoa_juridica"];

    /**
     * Cadastrar no banco:
     * 1 - Criar query com parâmetros indefinidos;
     * 2 - Prepare and bind
     * 3 - Executa
     * Se executar, inicia uma sessão
     * Se der erro, lança erro =)
     */

    $query = "INSERT INTO oportunidade (fk_pessoa_juridica, codigo_opo, titulo_opo,
        area_opo, contrato_opo, local_opo, numero_vagas_opo, descricao_opo,
        requisitos_opo, faixa_salarial_opo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param(
            "isssssissd",
            $pk,
            $codigo,
            $_POST["titulo"],
            $_POST["area"],
            $_POST["tipo_trabalho"],
            $local,
            $_POST["n_vagas"],
            $_POST["descricao"],
            $_POST["requisitos"],
            $_POST["faixa_salarial"]
        );

        if($stmt->execute()){
            header("Location: index.php");
        }
    }

    //Teste pra ver se tá pegando tudo certinho
    echo "<pre>";
    var_dump($pk);
    var_dump($codigo);
    var_dump($_POST["titulo"]);
    var_dump($_POST["area"]);
    var_dump($_POST["tipo_trabalho"]);
    var_dump($local);
    var_dump($_POST["n_vagas"]);
    var_dump($_POST["faixa_salarial"]);
    var_dump($_POST["descricao"]);
    var_dump($_POST["requisitos"]);
    echo "</pre>";

}

include("includes/header.php");
include("includes/form_criaroportunidade.php");
include("includes/footer.html");

$mysqli->close();