<?php
require_once '../model/regiaoDao.php';

$count = $_GET['count'];

$regioes = $objRegiaoDao->verRegioes();

foreach ($regioes as $regiao) {
    if ($regiao['status'] == 1) {
        $classe = 'class="habilitado"';
    } else {
        $classe = 'class="desabilitado"';
    }

    echo '<tr ' . $classe . '>
            <td>' . utf8_encode($regiao["nome"]) . '</td>
            <td>' . $regiao["dataPublicacao2"] . '</td>
            <td><a href="altNoticia.php?id=' . $regiao['idRegiao'] . '">Alterar</a></td>
            <td><a href="javascript:delNoticia(' . $regiao["idRegiao"] . ')">Excluir</a></td>
          </tr>';
}

if ($count < $quantidade) {
    echo '<tr>
            <td colspan="4" style="text-align:center">' . $paginas . '</td>
        </tr>';
}
?>