<?php

require_once '../model/regiaoDao.php';

if (isset($_GET['count'])) {
    $count = $_GET['count'];
} else {
    $count = 5;
}

$regioes = $objRegiaoDao->listaRegiao();

foreach ($regioes as $regiao) {
    if ($regiao['status'] == 1) {
        $classe = 'class="habilitado"';
    } else {
        $classe = 'class="desabilitado"';
    }

    echo '<tr ' . $classe . '>
            <td>' . utf8_encode($regiao["nome"]) . '</td>
            <td><a href="altRegiao.php?id=' . $regiao['idRegiao'] . '">Alterar</a></td>
            <td><a href="javascript:delRegiao(' . $regiao["idRegiao"] . ')">Excluir</a></td>
          </tr>';
}
?>