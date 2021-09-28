<?php

/**
 * Conexão ao banco de dados.
 */

$servername = "localhost";
$username = "guilherme";
$password = "abc123";
$dbname = "tcc1";

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

    if (!isset($_SESSION['login'])) {
        require_once "classes/Pessoa.php";
        require_once "classes/PessoaFisica.php";

        /**
         * Verifica se o formulário está preenchido.
         * Se estiver, prossegue para o cadastro no banco.
         * Se não, carrega o formulário para preenchimento.
         */
        if (
            isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['cpf'])
            && isset($_POST['email']) && $_POST['nascimento'] != "" && isset($_POST['estado'])
            && isset($_POST['municipio']) && isset($_POST['cep']) && isset($_POST['senha'])
        ) {

            /**
             * Instancia o objeto PessoaFisica
             * com as informações do formulário
             */
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $area = $_POST['area'];
            $nascimento = $_POST['nascimento'];
            $sexo = $_POST['sexo'];
            $estado = $_POST['estado'];
            $cidade = $_POST['municipio'];
            $cep = $_POST['cep'];
            $senha = $_POST['senha'];

            $pessoa = new PessoaFisica(
                $nome,
                $sobrenome,
                $cpf,
                $email,
                $area,
                $nascimento,
                $sexo,
                $estado,
                $cidade,
                $cep,
                $senha
            );

            /**
             * Preparativos para o banco:
             * Sexo cadastrado como M ou F.
             * Tipo atribuído como F (apenas banco).
             **/
            if ($sexo == "Feminino") {
                $sexo = "F";
            } else {
                $sexo = "M";
            }
            $tipo = "F";

            /**
             * Cadastrar no banco:
             * 1 - Criar query com parâmetros indefinidos;
             * 2 - Prepare and bind
             * 3 - Executa
             * Se executar, inicia uma sessão
             * Se der erro, lança erro =)
             */
            $query = "INSERT INTO pessoa (nome_pes, sobrenome_pes, cpf_pes,
                data_nasc_pes, sexo_pes, area_pes, email_pes, senha_pes, tipo_pes)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param(
                    "sssssssss",
                    $nome,
                    $sobrenome,
                    $cpf,
                    $nascimento,
                    $sexo,
                    $area,
                    $email,
                    $senha,
                    $tipo
                );

                if ($stmt->execute()) {
                    $_SESSION['login'] = $nome;
                    header("Location: index.php");
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
