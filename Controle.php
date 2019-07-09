<?php
require_once('Funcionario.php');
require_once('FuncionarioDao.php');
class Controle {
    function __construct() {}
    public function run() {
        $funcionarioDao = new FuncionarioDao();
        switch($_POST["flag"]) {
            case "cadastro_func":
                $funcionario = new Funcionario();
                $funcionario->setNome($_POST["nome"]);
                $funcionario->setId($_POST["id"]);
                if ($funcionarioDao->salvar($funcionario)) {
                    $mensagem = "Dados gravados com sucesso";
                } else {
                    $mensagem = "Erro na gravação";
                }
                header("Location: /mensagens.php?mensagem=" . $mensagem); 
                break;
            case "consulta_func":
                $id = $_POST["id"];
                $funcionario = $funcionarioDao->consultar($id);
                if ($funcionario) {
                    header("Location: /exibe_consulta_func.php?id=" . $funcionario->getId() . "&nome=" . $funcionario->getNome()); 
                } else {
                    header("Location: /mensagens.php?mensagem=Este funcionário não está cadastrado"); 
                }
                break;
            default:
                echo "Erro: Valor inexperado - " . $_POST["flag"];
        }
    }
}
$controle = new Controle();
$controle->run();
?>