<?php
require_once('Funcionario.php');
class FuncionarioDao {
    function __construct() {}
    public function salvar($funcionario) {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=banco', 'root','123456');
            $stmt = $conn->prepare("INSERT INTO funcionario (id, nome) VALUES (:id, :nome);"); 
            $id = $funcionario->getId();
            $stmt->bindValue(":id", $id);
            $nome = $funcionario->getNome();
            $stmt->bindParam(":nome", $nome);
            $stmt->execute();
            $conn = NULL;
            if ($stmt->rowCount() === 0) {
                return FALSE;
            }
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    public function consultar($id) {
        $conn = new PDO('mysql:host=localhost;dbname=banco', 'root','123456');
        $data = $conn->query('SELECT * FROM funcionario WHERE id = ' . $conn->quote($id));
        $result = $data->fetch();
        $conn = NULL;
        if ($result) {
            print_r($result);
            $funcionario = new Funcionario();
            $funcionario->setId($result['id']);
            $funcionario->setNome($result['nome']);
            return $funcionario;
        } else {
            return FALSE;
        }
    }
}
?>