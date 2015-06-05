<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/regiao.js"></script>
    </head>
    <body>
        <?php
        include_once '../include/header.php';
        include_once '../include/lateral.php';
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Região</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimas regiões</h1>
                <a href="verRegiao.php" class="proPage">Ver todas as regiões</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 60%;">Título</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaRegiao"></tbody>
                </table>

                <hr/>

                <h1>Cadastrar região</h1>
                <?php
                include_once 'formRegiao.php';
                ?>
            </div>
        </div>
    </body>
</html>
