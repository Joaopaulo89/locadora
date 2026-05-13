<?php
require_once 'config/Conexao.php';
require_once 'model/Veiculo.php';

class VeiculoDAO {
    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConn();
    }

    public function salvar(Veiculo $veiculo) {
        $stmt = $this->conn->prepare("INSERT INTO veiculos (modelo, marca, ano, preco, situacao) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$veiculo->getModelo(), $veiculo->getMarca(), $veiculo->getAno(), $veiculo->getPreco(), $veiculo->getSituacao()]);
    }

    public function listar() {
        $stmt = $this->conn->query("SELECT * FROM veiculos");
        $veiculos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $v = new Veiculo();
            $v->setId($row['id']);
            $v->setModelo($row['modelo']);
            $v->setMarca($row['marca']);
            $v->setAno($row['ano']);
            $v->setPreco($row['preco']);
            $v->setSituacao($row['situacao']);
            $veiculos[] = $v;
        }
        return $veiculos;
    }

    public function deletar($id) {
        $stmt = $this->conn->prepare("DELETE FROM veiculos WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM veiculos WHERE id = ?");
        $stmt->execute([$id]);
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $v = new Veiculo();
            $v->setId($row['id']);
            $v->setModelo($row['modelo']);
            $v->setMarca($row['marca']);
            $v->setAno($row['ano']);
            $v->setPreco($row['preco']);
            $v->setSituacao($row['situacao']);
            return $v;
        }
        return null;
    }

    public function atualizar(Veiculo $veiculo) {
        $stmt = $this->conn->prepare("UPDATE veiculos SET modelo=?, marca=?, ano=?, preco=?, situacao=? WHERE id=?");
        $stmt->execute([$veiculo->getModelo(), $veiculo->getMarca(), $veiculo->getAno(), $veiculo->getPreco(), $veiculo->getSituacao(), $veiculo->getId()]);
    }

    public function atualizarSituacao($id, $situacao) {
        $stmt = $this->conn->prepare("UPDATE veiculos SET situacao = ? WHERE id = ?");
        $stmt->execute([$situacao, $id]);
    }
}