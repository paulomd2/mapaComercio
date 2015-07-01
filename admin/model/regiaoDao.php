<?php

require_once 'banco.php';
require_once 'bean/regiao.php';

class RegiaoDAO extends Banco {

    public function listaRegiao() {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_REGIAO . " WHERE status != 0";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function verRegiao1(Regiao $objRegiao) {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_REGIAO . " WHERE idRegiao = " . $objRegiao->getIdRegiao();

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;
        $this->fechaConexao();
    }

    public function cadRegiao(Regiao $objRegiao) {
        $conexao = $this->abreConexao();

        $sql = "
                INSERT INTO " . TBL_REGIAO . " SET
                nome = '" . $objRegiao->getNome() . "',
                texto = '" . $objRegiao->getTexto() . "',
                imagem = '" . $objRegiao->getImagem() . "',
                informacoes = '" . $objRegiao->getInformacoes() . "',
                status = '" . $objRegiao->getStatus() . "'
               ";

        $conexao->query($sql) or die($conexao->error);
    }

    public function altRegiao(Regiao $objRegiao) {
        $conexao = $this->abreConexao();

        $sql = "
                UPDATE " . TBL_REGIAO . " SET
                nome = '" . $objRegiao->getNome() . "',
                texto = '" . $objRegiao->getTexto() . "',
                imagem = '" . $objRegiao->getImagem() . "',
                informacoes = '" . $objRegiao->getInformacoes() . "',
                status = '" . $objRegiao->getStatus() . "'
                    WHERE idRegiao = " . $objRegiao->getIdRegiao() . "
               ";

        $conexao->query($sql);
    }

    public function delRegiao(Regiao $objRegiao) {
        $conexao = $this->abreConexao();

        $sql = "
                UPDATE " . TBL_REGIAO . " SET
                status = 0
                    WHERE idRegiao = " . $objRegiao->getIdRegiao() . "
               ";

        $conexao->query($sql);
    }

}

$objRegiaoDao = new RegiaoDAO();
