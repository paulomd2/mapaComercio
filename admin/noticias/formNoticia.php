<?php
require_once '../model/banco.php';
require_once '../model/regiaoDao.php';

if (isset($_GET['id'])) {
    require_once '../model/noticiasDao.php';

    $idNoticia = $_GET['id'];

    $objNoticia->setIdNoticia($idNoticia);

    $noticia = $objNoticiaDao->verNoticia1($objNoticia);
}
?>
<form id="<?php echo (isset($noticia)) ? 'frmAltNoticia' : 'frmCadNoticia' ?>" action="../control/controleNoticias.php" method="post" enctype="multipart/form-data">
    <?php
    if (isset($noticia)) {
        echo '<input type="hidden" value="altNoticia" name="opcao" id="opcao" />
              <input type="hidden" value="' . $noticia["idNoticia"] . '" name="idNoticia" id="idNoticia" />
              <input type="hidden" value="' . $noticia["foto"] . '" name="fotoAntiga" id="fotoAntiga" />
             ';
    } else {
        echo '<input type="hidden" value="cadNoticia" name="opcao" id="opcao">';
    }
    ?>    
    <table class="tableform">
        <tr>
            <td>Título:</td>
            <td>
                <input type="text" name="titulo" id="titulo" <?php echo (isset($noticia)) ? "value='" . $noticia['titulo'] . "'" : ''; ?>  /><br />
                <span id="spanTitulo" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Subtítulo:</td>
            <td>
                <input type="text" name="subtitulo" id="subtitulo" <?php echo (isset($noticia)) ? "value='" . $noticia['subtitulo'] . "'" : ''; ?> /><br />
                <span id="spanSubtitulo" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Caderno:</td>
            <td>
                <select id="caderno" name="caderno">
                    <option value="">Selecione um Caderno...</option>
                    <option value="Caderno1" <?php echo (isset($noticia) && $noticia['caderno'] == 'Caderno1') ? 'selected' : '' ?>>Caderno 1</option>
                    <option value="Caderno2" <?php echo (isset($noticia) && $noticia['caderno'] == 'Caderno2') ? 'selected' : '' ?>>Caderno 2</option>
                    <option value="Caderno3" <?php echo (isset($noticia) && $noticia['caderno'] == 'Caderno3') ? 'selected' : '' ?>>Caderno 3</option>
                    <option value="Caderno4" <?php echo (isset($noticia) && $noticia['caderno'] == 'Caderno4') ? 'selected' : '' ?>>Caderno 4</option>
                </select><br />
                <span id="spanCaderno" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Tipo:</td>
            <td>
                <select id="tipo" name="tipo">
                    <option value="">Selecione um Tipo...</option>
                    <option value="tipo1" <?php echo (isset($noticia) && $noticia['tipoNoticia'] == 'tipo1') ? 'selected' : '' ?>>Tipo 1</option>
                    <option value="tipo2" <?php echo (isset($noticia) && $noticia['tipoNoticia'] == 'tipo2') ? 'selected' : '' ?>>Tipo 2</option>
                    <option value="tipo3" <?php echo (isset($noticia) && $noticia['tipoNoticia'] == 'tipo3') ? 'selected' : '' ?>>Tipo 3</option>
                    <option value="tipo4" <?php echo (isset($noticia) && $noticia['tipoNoticia'] == 'tipo4') ? 'selected' : '' ?>>Tipo 4</option>
                </select><br />
                <span id="spanTipo" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>região:</td>
            <td>
                <select id="regiao" name="regiao">
                    <option value="">Selecione uma Região...</option>
                    <?php
                    $regioes = $objRegiaoDao->listaRegiao();

                    foreach ($regioes as $regiao) {
                        $selected = '';
                        if (isset($noticia) && $noticia['idRegiao'] == $regiao['idRegiao']) {
                            $selected = 'selected';
                        }

                        echo '<option value="' . $regiao["idRegiao"] . '" '.$selected.'>' . $regiao["nome"] . '</option>';
                    }
                    ?>
                </select><br />
                <span id="spanRegiao" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Texto:</td>
            <td>
                <textarea type="text" name="texto" id="texto" cols="40" rows="8"><?php echo (isset($noticia)) ? $noticia['texto'] : ''; ?></textarea><br />
                <span id="spanTexto" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Foto de Capa:</td>
            <td>
                <input type="file" id="foto" name="foto" /><br />
                <span id="spanFoto" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Crédito da Foto:</td>
            <td>
                <input type="text" id="credito" name="credito" <?php echo (isset($noticia)) ? "value='" . $noticia['creditoFoto'] . "'" : ''; ?> /><br />
                <span id="spanCredito" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Data de Publicação:</td>
            <td>
                <input type="date" name="publicacao" id="publicacao" <?php echo (isset($noticia)) ? "value='" . $noticia['dataPublicacao'] . "'" : ''; ?> /><br />
                <span id="spanPublicacao" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select id="status" name="status">
                    <option value="">Selecione um Status...</option>
                    <option value="1" <?php echo (isset($noticia) && $noticia['status'] == 1) ? "selected" : ''; ?>>Habilitado</option>
                    <option value="2" <?php echo (isset($noticia) && $noticia['status'] == 2) ? "selected" : ''; ?>>Desabilitado</option>
                </select><br />
                <span id="spanStatus" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" id="btnCadastrar" value="Cadastrar" /></td>
        </tr>
    </table>
</form>                

<script>
    CKEDITOR.replace('texto', {
        uiColor: '#dfdfdf',
        filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
    });
</script>