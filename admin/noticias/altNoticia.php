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
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../js/noticias.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="index.php">Notícias</a>
                <a href="#">Alterar notícia</a>
            </div>
            <div class="tenor">
                <h1>Alterar notícia</h1>

                
                <div>
                    <div id="formNoticiaLoad"></div>

                </div>
            </div>
    </body>
</html>
