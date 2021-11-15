<?php
ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * Conexão com banco de dados
 * Verifica se há sessão ativa
 * Pesquisa o registro inteiro no banco
 * Atribui o tipo da conta ao registro
 */
require "conexao.php";
session_start();

if (isset($_SESSION["login"])) {
    $username = $_SESSION["login"]["username"];
    if ($_SESSION["login"]["tipo"] == "F") {
        $tipo = "F";
        $query = "SELECT * FROM pessoa_fisica WHERE username_pf = '$username';";
    } else {
        $tipo = "J";
        $query = "SELECT * FROM pessoa_juridica WHERE username_pj = '$username';";
    }

    /**
     * Se a busca for bem sucedida, verifica de qual tipo a conta é
     * Se F, inclui o formulário de pessoa física
     * Se J, inclui o formulário de pessoa jurídica
     */
    if ($row = $mysqli->query($query)->fetch_assoc()) {
        if ($tipo == "F") {
            //inclui o formulário de pessoa física
            echo "Física";
        } else {
            //inclui o formulário de pessoa jurídica
            echo "Jurídica";
        }
    }

} else {
    header("Location: index.php");
    exit();
}
