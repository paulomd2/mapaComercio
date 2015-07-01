<?php

require_once '../model/agendaDao.php';

if (isset($_GET['count'])) {
    $count = $_GET['count'];
} else {
    $count = 5;
}

$agendas = $objAgendaDao->listaAgenda();

foreach ($agendas as $agenda) {
    if ($agenda['status'] == 1) {
        $classe = 'class="habilitado"';
    } else {
        $classe = 'class="desabilitado"';
    }

    echo '<tr ' . $classe . '>
            <td>' . $agenda["cidade"] . '</td>
            <td>' . implode('/', array_reverse(explode('-',$agenda["data"]))) . '</td>
            <td><a href="altAgenda.php?id=' . $agenda['idAgenda'] . '">Alterar</a></td>
            <td><a href="javascript:delAgenda(' . $agenda["idAgenda"] . ')">Excluir</a></td>
          </tr>';
}
?>