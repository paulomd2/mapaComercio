<?php
class Regiao{
    private $idRegiao;
    private $nome;
    private $texto;
    private $imagem;
    private $status;
    private $informacoes;
    
    public function getIdRegiao() {
        return $this->idRegiao;
    }
    public function setIdRegiao($idRegiao) {
        $this->idRegiao = seg($idRegiao);
    }
    

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = seg($nome);
    }
    

    public function getTexto() {
        return $this->texto;
    }
    public function setTexto($texto) {
        $this->texto = seg($texto);
    }
    

    public function getImagem() {
        return $this->imagem;
    }
    public function setImagem($imagem) {
        $this->imagem = seg($imagem);
    }
    

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = seg($status);
    }
    

    public function getInformacoes() {
        return $this->informacoes;
    }
    public function setInformacoes($informações) {
        $this->informacoes = seg($informações);
    }
}

$objRegiao = new Regiao();