<?php
require_once 'dao/VeiculoDAO.php';
require_once 'model/Veiculo.php';

class VeiculoController {
    private $dao;

    public function __construct() {
        $this->dao = new VeiculoDAO();
    }

    public function salvar($modelo, $marca, $ano, $preco, $situacao) {
        $v = new Veiculo();
        $v->setModelo($modelo);
        $v->setMarca($marca);
        $v->setAno($ano);
        $v->setPreco($preco);
        $v->setSituacao($situacao);
        $this->dao->salvar($v);
    }

    public function listar() {
        return $this->dao->listar();
    }

    public function deletar($id) {
        $this->dao->deletar($id);
    }

    public function buscarPorId($id) {
        return $this->dao->buscarPorId($id);
    }

    public function atualizar($id, $modelo, $marca, $ano, $preco, $situacao) {
        $v = new Veiculo();
        $v->setId($id);
        $v->setModelo($modelo);
        $v->setMarca($marca);
        $v->setAno($ano);
        $v->setPreco($preco);
        $v->setSituacao($situacao);
        $this->dao->atualizar($v);
    }

    public function atualizarSituacao($id, $situacao) {
        $this->dao->atualizarSituacao($id, $situacao);
    }
}