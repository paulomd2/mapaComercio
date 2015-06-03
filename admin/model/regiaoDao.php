<?php
require_once 'banco.php';
require_once 'regiao.php';

class RegiaoDAO extends Banco{
    public function listaRegiao(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_REGIAO." WHERE status = 1";
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while ($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        $this->fechaConexao();
    }
}

$objRegiaoDao = new RegiaoDAO();