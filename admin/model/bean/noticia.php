<?php

class Noticia {

    private $idNoticia;
    private $idRegiao;
    private $titulo;
    private $subtitulo;
    private $texto;
    private $dataPublicacao;
    private $dataCadastro;
    private $status;
    private $foto;
    private $caderno;
    private $tipo;
    private $creditoFoto;
    
    public function getIdNoticia() {
        return $this->idNoticia;
    }
    public function setIdNoticia($idNoticia) {
        $this->idNoticia = seg($idNoticia);
    }

    public function getIdRegiao() {
        return $this->idRegiao;
    }
    public function setIdRegiao($idRegiao) {
        $this->idRegiao = seg($idRegiao);
    }
    
    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }
    

    public function getSubtitulo() {
        return $this->subtitulo;
    }
    public function setSubtitulo($subtitulo) {
        $this->subtitulo = seg($subtitulo);
    }
    

    public function getTexto() {
        return $this->texto;
    }
    public function setTexto($texto) {
        $this->texto = seg($texto);
    }
    

    public function getDataPublicacao() {
        return $this->dataPublicacao;
    }
    public function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = seg($dataPublicacao);
    }
    

    public function getDataCadastro() {
        return $this->dataCadastro;
    }
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }
    

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = seg($status);
    }
    

    public function getFoto() {
        return $this->foto;
    }
    public function setFoto($foto) {
        $this->foto = seg($foto);
    }

    public function getCaderno() {
        return $this->caderno;
    }
    public function setCaderno($caderno) {
        $this->caderno = seg($caderno);
    }
    

    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = seg($tipo);
    }
    

    public function getCreditoFoto() {
        return $this->creditoFoto;
    }
    public function setCreditoFoto($creditoFoto) {
        $this->creditoFoto = seg($creditoFoto);
    }
}

$objNoticia = new Noticia();
