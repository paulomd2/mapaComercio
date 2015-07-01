<?php
setcookie("ck_authorized", "true", 0, "/");
?>
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
                <a href="./">Eventos</a>
                <a href="#">Alterar agenda</a>
            </div>
            <div class="tenor">
                <h1>Alterar evento</h1>

                <a href="verAgenda.php" class="proPage">Todas os eventos</a>
                <?php
                include_once 'formAgenda.php';
                ?>
            </div>
    </body>
</html>
