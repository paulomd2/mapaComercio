<?php
setcookie("ck_authorized", "true", 0, "/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <!--<script type="text/javascript" src="../js/jquery-2.1.3.js"></script>-->
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
                <a href="./">Notícias</a>
                <a href="#">Alterar região</a>
            </div>
            <div class="tenor">
                <h1>Alterar região</h1>

                <a href="verRegiao.php" class="proPage">Todas as regiões</a>
                <?php
                include_once 'formRegiao.php';
                ?>
            </div>
    </body>
</html>
