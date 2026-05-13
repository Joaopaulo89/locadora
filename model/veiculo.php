<?php
class Veiculo {
    private $id;
    private $modelo;
    private $marca;
    private $ano;
    private $preco;
    private $situacao;

    public function getId() { return $this->id; }
    public function getModelo() { return $this->modelo; }
    public function getMarca() { return $this->marca; }
    public function getAno() { return $this->ano; }
    public function getPreco() { return $this->preco; }
    public function getSituacao() { return $this->situacao; }

    public function setId($id) { $this->id = $id; }
    public function setModelo($modelo) { $this->modelo = $modelo; }
    public function setMarca($marca) { $this->marca = $marca; }
    public function setAno($ano) { $this->ano = $ano; }
    public function setPreco($preco) { $this->preco = $preco; }
    public function setSituacao($situacao) { $this->situacao = $situacao; }
}