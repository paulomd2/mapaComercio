<?php
require_once '../model/banco.php';
require_once '../model/noticiasDao.php';

$noticias = $objNoticiaDao->verNoticias(5);
for ($i = 0; $i < count($noticias); $i++) {
    if ($noticias[$i]['status'] == 1) {
        $classe = 'class="habilitado"';
    } else {
        $classe = 'class="desabilitado"';
    }

    echo '<tr ' . $classe . '>
            <td>' . utf8_encode($noticias[$i]["titulo"]) . '</td>
            <td>' . $noticias[$i]["dataPublicacao2"] . '</td>
            <td><a href="altNoticia.php?id=' . $noticias[$i]['idNoticia'] . '">Alterar</a></td>
            <td><a href="javascript:delNoticia(' . $noticias[$i]["idNoticia"] . ')">Excluir</a></td>
          </tr>';
}
?>