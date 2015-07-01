<?php
class Agenda{
    private $idAgenda;
    private $idRegiao;
    private $data;
    private $dataCadastro;
    private $cidade;
    private $presidente;
    private $local;
    private $status;
    
    public function getIdAgenda() {
        return $this->idAgenda;
    }
    public function setIdAgenda($idAgenda) {
        $this->idAgenda = seg($idAgenda);
    }

    
    public function getIdRegiao() {
        return $this->idRegiao;
    }
    public function setIdRegiao($idRegiao) {
        $this->idRegiao = seg($idRegiao);
    }

    
    public function getData() {
        return $this->data;
    }
    public function setData($data) {
        $this->data = seg($data);
    }
    

    public function getCidade() {
        return $this->cidade;
    }
    public function setCidade($cidade) {
        $this->cidade = seg($cidade);
    }
    

    public function getPresidente() {
        return $this->presidente;
    }
    public function setPresidente($presidente) {
        $this->presidente = seg($presidente);
    }
    

    public function getLocal() {
        return $this->local;
    }
    public function setLocal($local) {
        $this->local = seg($local);
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


}

$objAgenda = new Agenda();