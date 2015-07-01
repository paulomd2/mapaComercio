<?php
require_once 'banco.php';
require_once 'bean/agenda.php';

class AgendaDAO extends Banco{
    public function verAgenda1(Agenda $objAgenda){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_AGENDA." WHERE idAgenda = ".$objAgenda->getIdAgenda();
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        return $linha;
        
        $this->fechaConexao();
    }
    
    public function cadAgenda(Agenda $objAgenda){
        $conexao = $this->abreConexao();
        
        $sql = "INSERT INTO ".TBL_AGENDA." SET
                idRegiao = ".$objAgenda->getIdRegiao().",
                data = '".$objAgenda->getData()."',
                cidade = '".$objAgenda->getCidade()."',
                presidente = '".$objAgenda->getPresidente()."',
                local = '".$objAgenda->getLocal()."',
                dataCadastro = '".$objAgenda->getDataCadastro()."',
                status = ".$objAgenda->getStatus()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    public function altAgenda(Agenda $objAgenda){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_AGENDA." SET
                idRegiao = ".$objAgenda->getIdRegiao().",
                data = '".$objAgenda->getData()."',
                cidade = '".$objAgenda->getCidade()."',
                presidente = '".$objAgenda->getPresidente()."',
                local = '".$objAgenda->getLocal()."',
                status = ".$objAgenda->getStatus()."
                    WHERE idAgenda = ".$objAgenda->getIdAgenda()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function delAgenda(Agenda $objAgenda){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_AGENDA." SET
                status = 0
                    WHERE idAgenda = ".$objAgenda->getIdAgenda()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function listaAgenda() {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_AGENDA . " WHERE status != 0 ORDER BY data DESC";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }
}

$objAgendaDao = new AgendaDAO();