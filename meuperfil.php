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
        require "includes/header.php";
        require "includes/usuario_logado.php";
        if ($tipo == "F") {
            //inclui o formulário de pessoa física
            echo "Física";
        } else {
            require "includes/perfil_recrutador.php";
            require "includes/footer.html";
            if (
                isset($_POST['atualizar']) && isset($_POST['nome']) && isset($_POST['cnpj'])
                && isset($_POST['email']) && isset($_POST['estado']) && isset($_POST['municipio'])
                && isset($_POST['area'])
            ) {
                $query = "UPDATE pessoa_juridica 
                        SET nome_pj = '" . $_POST['nome'] . "', 
                        cnpj_pj = '" . $_POST['cnpj'] . "', 
                        email_pj = '" . $_POST['email'] . "', 
                        estado_pj = '" . $_POST['estado'] . "', 
                        municipio_pj = '" . $_POST['municipio'] . "', 
                        area_pj = '" . $_POST['area'] . "', 
                        bio_pj = '" . $_POST['bio'] . "' 
                        WHERE username_pj = '$username';";
                if ($mysqli->query($query)) {
                    $query = "SELECT * FROM pessoa_juridica WHERE username_pj = '$username';";
                    if ($row = $mysqli->query($query)->fetch_assoc()) {
                        $_SESSION["login"] = [
                            "username" => $row["username_pj"],
                            "nome" => $row["nome_pj"],
                            "sobrenome" => "",
                            "area" => $row["area_pj"],
                            "tipo" => "J"
                        ];
                        header("location: meuperfil.php");
                        exit();
                    }
                }
            }
        }
    }
} else {
    header("Location: index.php");
    exit();
}

$mysqli->close();
