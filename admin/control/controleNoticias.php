<?php

require_once '../model/banco.php';
require_once '../model/noticiasDao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadNoticia": {

            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $caderno = $_POST['caderno'];
            $tipo = $_POST['tipo'];
            $regiao = $_POST['regiao'];
            $texto = $_POST['texto'];
            $foto = uploadImagem();
            $creditoFoto = $_POST['credito'];
            $dataPublicacao = $_POST['publicacao'];
            $status = $_POST["status"];
            $dataCadastro = date('Y-m-d H:i:s');

            $objNoticia->setTitulo($titulo);
            $objNoticia->setSubtitulo($subtitulo);
            $objNoticia->setTexto($texto);
            $objNoticia->setCaderno($caderno);
            $objNoticia->setTipo($tipo);
            $objNoticia->setIdRegiao($regiao);
            $objNoticia->setFoto($foto);
            $objNoticia->setCreditoFoto($creditoFoto);
            $objNoticia->setStatus($status);
            $objNoticia->setDataPublicacao($dataPublicacao);
            $objNoticia->setDataCadastro($dataCadastro);

            $objNoticiaDao->cadNoticia($objNoticia);
            break;
        }

    case "altNoticia": {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['sutitulo'];
            $caderno = $_POST['caderno'];
            $tipo = $_POST['tipo'];
            $regiao = $_POST['regiao'];
            $texto = $_POST['texto'];
            $foto = uploadImagem();
            $creditoFoto = $_POST['credito'];
            $dataPublicacao = $_POST['publicacao'];
            $status = $_POST["status"];
            $dataCadastro = date('Y-m-d H:i:s');
            $idNoticia = $_POST['idNoticia'];

            $objNoticia->setTitulo($titulo);
            $objNoticia->setSubtitulo($subtitulo);
            $objNoticia->setTexto($texto);
            $objNoticia->setCaderno($fonte);
            $objNoticia->setTipo($mercado);
            $objNoticia->setRegiao($mercado);
            $objNoticia->setFoto($mercado);
            $objNoticia->setCreditoFoto($mercado);
            $objNoticia->setStatus($status);
            $objNoticia->setDataPublicacao($DataPublicacao);
            $objNoticia->setDataCadastro($dataCadastro);
            $objNoticia->setIdNoticia($idNoticia);

            $objNoticiaDao->altNoticia($objNoticia);
            break;
        }

    case "excluir": {
            $idNoticia = $_POST['idNoticia'];

            $objNoticia->setIdNoticia($idNoticia);

            $objNoticiaDao->delNoticia($objNoticia);
            $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'NOTICIAS', $objNoticia->getIdNoticia(), date('Y-m-d H:i:s'));
            break;
        }
}

function uploadImagem() {

    $valido = true;
    $tipoArquivo = pathinfo($_FILES['foto']['name']);
    $tipoArquivo = '.' . $tipoArquivo ['extension'];

    $new_file_name = strtolower(md5($_FILES['foto']['name'] . date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['foto']['size'] > (2097152 )) { //não pode ser maior que 2Mb
        $valido = false;
    } else {
        @$imagemAntiga = '../../images/' . $_POST["imagemAntiga"];

        if (!file_exists('../../images/')) {
            @mkdir('../../images');
        } elseif (file_exists($imagemAntiga)) {
            @unlink($imagemAntiga);
        }
        @move_uploaded_file($_FILES['foto']['tmp_name'], '../../images/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}