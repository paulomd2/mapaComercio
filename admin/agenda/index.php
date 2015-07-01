<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/agenda.js"></script>
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
                <h1>Últimos eventos</h1>
                <a href="verAgenda.php" class="proPage">Ver todos os eventos</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 60%;">Cidade</td>
                            <td style="width: 20%;">Data</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaAgenda"></tbody>
                </table>

                <hr/>

                <h1>Cadastrar agenda</h1>
                <?php
                include_once 'formAgenda.php';
                ?>
            </div>
        </div>
    </body>
</html>
