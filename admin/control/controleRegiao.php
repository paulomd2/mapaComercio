<?php

require_once '../model/banco.php';
require_once '../model/regiaoDao.php';

$opcao = $_POST['opcao'];

//var_dump($opcao);
//die();
switch ($opcao) {
    default :
        header('Location: ../../');
        break;

    case 'cadRegiao':
        $nome = $_POST['nome'];
        $texto = $_POST['texto'];
        $status = $_POST['status'];
        $imagem = uploadImagem($_FILES['imagem']);
        $informacoes = uploadImagem($_FILES['informacoes']);

        $objRegiao->setNome($nome);
        $objRegiao->setTexto($texto);
        $objRegiao->setStatus($status);
        $objRegiao->setImagem($imagem);
        $objRegiao->setInformacoes($informacoes);

        $objRegiaoDao->cadRegiao($objRegiao);

        header('Location: ../regiao/verRegiao.php');

        break;

    case 'altRegiao':
        $nome = $_POST['nome'];
        $texto = $_POST['texto'];
        $status = $_POST['status'];
        $idRegiao = $_POST['idRegiao'];

        if ($_FILES['imagem']['name'] != '') {
            $imagem = uploadImagem($_FILES['imagem']);
        } else {
            $imagem = $_POST['imagemAntiga'];
        }

        if ($_FILES['informacoes']['name'] != '') {
            $informacoes = uploadImagem($_FILES['informacoes']);
        } else {
            $informacoes = $_POST['informacoesAntiga'];
        }

        $objRegiao->setIdRegiao($idRegiao);
        $objRegiao->setNome($nome);
        $objRegiao->setTexto($texto);
        $objRegiao->setStatus($status);
        $objRegiao->setImagem($imagem);
        $objRegiao->setInformacoes($informacoes);

        $objRegiaoDao->altRegiao($objRegiao);

        header('Location: ../regiao/verRegiao.php');
        break;


    case 'delRegiao':
        $idRegiao = $_POST['idRegiao'];

        $objRegiao->setIdRegiao($idRegiao);

        $objRegiaoDao->delRegiao($objRegiao);
        break;
}

function uploadImagem($arquivo) {

    $valido = true;
    $tipoArquivo = pathinfo($arquivo['name']);
    $tipoArquivo = '.' . $tipoArquivo ['extension'];

    $new_file_name = strtolower(md5($arquivo['name'] . date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($arquivo['size'] > (2097152 )) { //não pode ser maior que 2Mb
        $valido = false;
    } else {
        @$imagemAntiga = '../../images/' . $_POST["imagemAntiga"];

        if (!file_exists('../../images/')) {
            @mkdir('../../images');
        } elseif (file_exists($imagemAntiga)) {
            @unlink($imagemAntiga);
        }
        @move_uploaded_file($arquivo['tmp_name'], '../../images/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}
