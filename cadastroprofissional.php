<?php

/**
 * Conexão ao banco de dados.
 */

$servername = "localhost";
$username = "guilherme";
$password = "abc123";
$dbname = "tcc2";

$mysqli = new mysqli($servername, $username, $password, $dbname);

/**
 * Verifica a conexão.
 * Se conectado, prossegue para o cadastro.
 * Se não, lança erro.
 */
if (!$mysqli->connect_error) {

    /**
     * Verifica se já existe uma sessão.
     * Se não existir, prossegue para o cadastro.
     * Se existir, redireciona para o index.php.
     */
    session_start();

    if (!isset($_SESSION["login"])) {

        /**
         * Verifica se o formulário está preenchido.
         * Se estiver, prossegue para o cadastro no banco.
         * Se não, carrega o formulário para preenchimento.
         */
        if (
            isset($_POST['username']) && isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['cpf'])
            && isset($_POST['email']) && $_POST['nascimento'] != "" && isset($_POST['estado'])
            && isset($_POST['municipio']) && isset($_POST['cep']) && isset($_POST['senha'])
        ) {

            /**
             * Instancia variáveis com as informações do formulário
             */
            $username = $_POST['username'];
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $area = $_POST['area'];
            $nascimento = $_POST['nascimento'];
            $sexo = $_POST['sexo'];
            $estado = $_POST['estado'];
            $municipio = $_POST['municipio'];
            $cep = $_POST['cep'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            //Password Hash: gera um valor único criptografado para cada senha

            /**
             * Preparativos para o banco:
             * Sexo cadastrado como M ou F.
             **/
            if ($sexo == "Feminino") {
                $sexo = "F";
            } else {
                $sexo = "M";
            }

            /**
             * Cadastrar no banco:
             * 1 - Criar query com parâmetros indefinidos;
             * 2 - Prepare and bind
             * 3 - Executa
             * Se executar, inicia uma sessão
             * Se der erro, lança erro =)
             */
            $query = "INSERT INTO pessoa_fisica (username_pf, nome_pf, sobrenome_pf, cpf_pf,
                data_nascimento_pf, sexo_pf, area_pf, municipio_pf, estado_pf, email_pf, senha_pf)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param(
                    "sssssssss",
                    $username,
                    $nome,
                    $sobrenome,
                    $cpf,
                    $nascimento,
                    $sexo,
                    $area,
                    $municipio,
                    $estado,
                    $email,
                    $senha
                );

                if ($stmt->execute()) {
                    $_SESSION['login'] = [
                        "username" => $username,
                        "nome" => $nome,
                        "sobrenome" => $sobrenome,
                        "area" => $area,
                        "tipo" => "F"
                    ];
                    header("Location: index.php");
                    //print_r($_SESSION['login']);
                } else {
                    die("Erro na execução da query: " . $mysqli->error);
                }
            } else {
                die("Erro na preparação do statement: " . $mysqli->error);
            }
        } else {
            include "includes/header.php";
            include "includes/form_cadastroprofissional.php";
            include "includes/footer.php";
        }
    } else {
        header("Location: index.php");
    }
} else {
    die("Erro ao conectar-se ao banco de dados: " . $mysqli->connect_error);
}

$mysqli->close();