<?php
if (empty($_SESSION)) {
//    @header('Location: ../');
    $_SESSION['id'] = '1';
    $_SESSION['idioma'] = '1';
}
?>
<script src="../usuarios/js/usuario.js"></script>
<script src="../js/index.js"></script>
<div class="center-user">

    <div class="detail-user">
        <figure class="avatar fl">
            <a href="../home"><img src="http://www.portalgl.com.br/imagens/logo_glevents.png" alt="Nome avatar" /></a>
        </figure>
        <div class="fr"></div>
        <span><em>Seja Bem vindo</em></span>
        <span>
            <?php
            require_once '../model/banco.php';
            require_once '../usuarios/model/dao.php';

            $objUsuario->setIdUsuario($_SESSION['id']);

            $usuarioLogado = $objUsuarioDao->verUsuario1($objUsuario);

            echo $usuarioLogado['nome'] . " <a href='../home/editar-user.php' class='editar-user' title='Editar usuário'><i class='icon icon-pencil'></i></a>";
            ?>
        </span>
    </div>
    <div class="barra-user">
        <div class="busca">
            <a href="#" onclick="javascript:mostraForm('formbusca');"><i class="icon icon-search"></i></a>
            <form class="form-busca-oculta" id="formbusca">
                <input type="text" id="busca" name="busca" />
                <select name="modulo" id="modulo">
                    <option value="noticias">NOTÍCIA</option>
                    <option value="releases">RELEASES</option>
                    <option value="destaques">DESTAQUES</option>
                    <option value="eventos">EVENTOS</option>
                    <option value="banners">BANNERS</option>
                    <option value="expositores">EXPOSITORES</option>
                    <option value="caravanas">CARAVANAS</option>
                </select>
                <input type="button" value="BUSCAR" id="btnBusca"/><br />
                <span id="erroBusca" class="erro"></span>
            </form>
        </div>
        <div class="logout">
            <a <?php if ($_SESSION['idioma'] == 'pt') {
                echo 'href="#" class="marcLang"';
            } else {
                echo 'href="javascript:idioma(\'pt\')"';
            } ?>>PT</a>
            <a <?php if ($_SESSION['idioma'] == 'en') {
                echo 'href="#" class="marcLang"';
            } else {
                echo 'href="javascript:idioma(\'en\')"';
            } ?>>EN</a>
            <a <?php if ($_SESSION['idioma'] == 'es') {
                echo 'href="#" class="marcLang"';
            } else {
                echo 'href="javascript:idioma(\'es\')"';
            } ?>>ES</a>
            <a href="#" class="visu-site">Visualizar site</a>
            <a href="#" onclick="deslogar()" class="sair">Sair</a>
        </div>
    </div>
    <div class="cb"></div>
</div>
