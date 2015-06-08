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

            header('Location: ../noticias');
            break;
        }

    case "altNoticia": {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $caderno = $_POST['caderno'];
            $tipo = $_POST['tipo'];
            $regiao = $_POST['regiao'];
            $texto = $_POST['texto'];
            $foto = '';
            $creditoFoto = $_POST['credito'];
            $dataPublicacao = $_POST['publicacao'];
            $status = $_POST["status"];
            $idNoticia = $_POST['idNoticia'];

            if ($_FILES['foto']['name'] == '') {
                $foto = $_POST['fotoAntiga'];
            } else {
                echo 'não entrou';
                $foto = uploadImagem();
            }

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
            $objNoticia->setIdNoticia($idNoticia);

            $objNoticiaDao->altNoticia($objNoticia);

            header('Location: ../noticias');
            break;
        }

    case "excluir":
        $idNoticia = $_POST['idNoticia'];

        $objNoticia->setIdNoticia($idNoticia);

        $objNoticiaDao->delNoticia($objNoticia);
        break;
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
