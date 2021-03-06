<?php
require_once 'banco.php';
require_once 'bean/noticia.php';

class NoticiasDAO extends Banco {

    public function cadNoticia(Noticia $objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_NOTICIA . " SET
               idRegiao = '" . $objNoticia->getIdRegiao() . "',
               titulo = '" . $objNoticia->getTitulo() . "',
               subtitulo = '" . $objNoticia->getSubTitulo() . "',
               texto = '" . $objNoticia->getTexto() . "',
               foto = '" . $objNoticia->getFoto() . "',
               creditoFoto = '" . $objNoticia->getCreditoFoto() . "',
               tipoNoticia = '" . $objNoticia->getTipo() . "',
               caderno = '" . $objNoticia->getCaderno() . "',
               dataPublicacao = '" . $objNoticia->getDataPublicacao() . "',
               dataCadastro = '" . $objNoticia->getDataCadastro() . "',
               status = " . $objNoticia->getStatus() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altNoticia($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_NOTICIA . " SET
               idRegiao = '" . $objNoticia->getIdRegiao() . "',
               titulo = '" . $objNoticia->getTitulo() . "',
               subtitulo = '" . $objNoticia->getSubTitulo() . "',
               texto = '" . $objNoticia->getTexto() . "',
               foto = '" . $objNoticia->getFoto() . "',
               creditoFoto = '" . $objNoticia->getCreditoFoto() . "',
               tipoNoticia = '" . $objNoticia->getTipo() . "',
               caderno = '" . $objNoticia->getCaderno() . "',
               dataPublicacao = '" . $objNoticia->getDataPublicacao() . "',
               status = " . $objNoticia->getStatus() . "
                   WHERE idNoticia = " . $objNoticia->getIdNoticia() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delNoticia($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_NOTICIA . " 
                SET status = 0
                WHERE idNoticia = " . $objNoticia->getIdNoticia();

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function verNoticias($count) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                FROM " . TBL_NOTICIA . "
                    WHERE status != 0
                        ORDER BY dataPublicacao DESC
                        LIMIT " . $count . "
                ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function numNoticias() {
        $conexao = $this->abreConexao();

        $sql = "SELECT COUNT(*) AS quantidade FROM " . TBL_NOTICIA . "
                    WHERE status != 0";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();
        return $linha['quantidade'];

        $this->fechaConexao();
    }

    public function verNoticiasHome($count) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao
                FROM " . TBL_NOTICIA . "
                    WHERE status != 0
                        ORDER BY idNoticia DESC
                        LIMIT " . $count . "
                ";

        $banco = $conexao->query($sql);

        $linhas[] = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function verNoticia1($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacaoFormatada
                FROM " . TBL_NOTICIA . "
                    WHERE idNoticia = " . $objNoticia->getIdNoticia() . "
                        ORDER BY dataPublicacao DESC
                ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

    public function busca($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT *
                    FROM " . TBL_NOTICIA . "
                        WHERE titulo like '%" . $objNoticia->getTitulo() . "%'
                        AND status in(1,2)
               ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
    }

}

$objNoticiaDao = new NoticiasDAO();
