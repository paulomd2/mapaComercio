<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <style>
            .slidesjs-pagination{
                margin:0 15px 0 0;
                list-style:none;
                position:relative;
                z-index:999
            }
            .slidesjs-pagination li{
                float:left;
                margin:0 1px;
            }
            .slidesjs-pagination li a{
                display:block;
                width:13px;
                height:0;
                padding-top:13px;
                background-image:url(../imagens/pagination.png);
                background-position:0 0;
                float:left;
                /*overflow:hidden;*/
            }
            .slidesjs-pagination li a.active,.slidesjs-pagination li a:hover.active{
                background-position:0 -13px
            }
            .slidesjs-pagination li a:hover{
                background-position:0 -26px
            }
            #slides{
                width:90%;
                height:auto;
                position:relative;
            }
            #slides img{
                width:100%
            }
        </style>
    </head>
    <body>
        <?php
        include_once '../include/header.php';
        include_once '../include/lateral.php';
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="#"><i class="icon icon-home"></i> Home</a>
            </div>
            <div class="box noticias">
                <div class="tit-box">
                    <strong>ÚLTIMAS</strong> NOTÍCIAS CADASTRADAS
                    <!--<div class="plus"><a href="#"><i class="icon icon-pencil"></i></a></div>-->
                    <div class="plus"><a href="../noticias/cadNoticia.php">+</a></div>
                </div>
                <table>
                    <?php
                    require_once '../model/banco.php';
                    require_once '../model/noticiasDao.php';

                    $noticias = $objNoticiaDao->verNoticias(8);

                    foreach ($noticias as $noticia) {
                        $explode = explode('-', $noticia["dataPublicacao"]);
                        $data = $explode[2] . '/' . $explode[1];

                        echo '
                                    <tr>
                                        <td>' . $data . '</td>
                                        <td><a href="../noticias/altNoticia.php?id=' . $noticia["idNoticia"] . '">' . utf8_encode($noticia["titulo"]) . '</a></td>
                                    </tr>
                                 ';
                    }
                    ?>
                </table>
            </div>
            <!--div class="box eventos">
                <div class="tit-box">
                    <strong>ÚLTIMOS</strong> RELEASES CADASTRADOS
                    <div class="plus"><a href="../releases/cadRelease.php">+</a></div>
                </div>
                <table>
            <?php
            require_once '../model/banco.php';
            require_once '../releases/model/dao.php';

            $releases = $objReleasesDao->verReleases(8, $_SESSION['idioma']);

            for ($i = 0; $i < count($releases); $i++) {
                $explode = explode('-', $releases[$i]["dataEntrada"]);
                $data = $explode[2] . '/' . $explode[1];

                echo '
                                    <tr>
                                        <td>' . $data . '</td>
                                        <td><a href="../releases/altRelease.php?id=' . $releases[$i]["idRelease"] . '">' . utf8_encode($releases[$i]["titulo"]) . '</a></td>
                                    </tr>
                                 ';
            }
            ?>
                </table>
            </div>
            <div class="box banners" style="background: #fff;">
                <div class="tit-box">
                    <strong>ÚLTIMOS</strong> BANNERS
                    <div class="plus"><a href="../banners/cadBanner.php">+</a></div>
                </div>
                <div style="width: 373px; height: 230px; margin: 0 auto; padding: 15px 0;">
            <?php
            require_once '../banners/model/dao.php';
            $banners = $objBannersDao->listaBanners($_SESSION['idioma']);

//                    echo var_dump($banners);

            if (count($banners) > 1) {
                echo "<div id='slides'>";
            } else {
                echo "<div id='sumiu'>";
            }
            ?>
            <!--<div id="slides">
            <?php
            for ($i = 0; $i < count($banners); $i++) {
                echo '<img src="../images/' . $banners[$i]["imagem"] . '" alt="" title="' . $banners[$i]["nome"] . '" style="width:100%!important;" />';
            }
            ?>
            <?php echo "</div>"; ?>
            <script src="../js/jquery.slides.min.js"></script>
            <script>
                $(function() {
                    $('#slides').slidesjs({
                        width: 373,
                        height: 220,
                        navigation: false
                    });
                });
            </script>
        </div>

    </div>
    <div class="box destaques">
            <?php
            require_once '../destaques/model/dao.php';

            $destaques = $objDestaqueDao->verDestaques(4, $_SESSION['idioma']);
            ?>
        <div class="tit-box">
            <strong>ÚLTIMOS</strong> DESTAQUES CADASTRADOS
            <div class="plus"><a href="../destaques/cadDestaque.php">+</a></div>
        </div>
        <table>
            <?php
            for ($i = 1; $i < count($destaques); $i++) {
                $explodeCadastro = explode(' ', $destaques[$i]['dataCadastro']);
                $dataCadastro = implode('/', array_reverse(explode('-', $explodeCadastro[0])));
                $explodeCadastro = explode('/', $dataCadastro);
                $dataCadastro = $explodeCadastro[0] . '/' . $explodeCadastro[1];
                echo '
                                    <tr>
                                        <td>' . $dataCadastro . '</td>
                                        <td><a href="../destaques/altDestaque.php?id=' . $destaques[$i]["idDestaque"] . '">' . $destaques[$i]["titulo"] . '</td>
                                    </tr>
                                    ';
            }
            ?>
        </table>
    </div-->

        </div>
    </body>
</html>