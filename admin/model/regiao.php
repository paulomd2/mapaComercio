<?php
class Regiao{
    private $idRegiao;
    private $nome;
    private $texto;
    private $cor;
    private $imagem;
    private $status;
    private $informações;
    
    public function getIdRegiao() {
        return $this->idRegiao;
    }
    public function setIdRegiao($idRegiao) {
        $this->idRegiao = $idRegiao;
    }
    

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    

    public function getTexto() {
        return $this->texto;
    }
    public function setTexto($texto) {
        $this->texto = $texto;
    }
    

    public function getCor() {
        return $this->cor;
    }
    public function setCor($cor) {
        $this->cor = $cor;
    }
    

    public function getImagem() {
        return $this->imagem;
    }
    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
    

    public function getInformações() {
        return $this->informações;
    }
    public function setInformações($informações) {
        $this->informações = $informações;
    }
}

$objRegiao = new Regiao();