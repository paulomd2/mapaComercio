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
<form name="cadNoticia">
    <input type="hidden" value="<?php echo $_GET['mercado']; ?>" id="mercado"/>
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
                <input type="text" name="subTitulo" id="subTitulo" <?php echo (isset($noticia)) ? "value='" . $noticia['subtitulo'] . "'" : ''; ?> /><br />
                <span id="spanSub" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Caderno:</td>
            <td>
                <select id="caderno" name="caderno">
                    <option value="Caderno1">Caderno 1</option>
                    <option value="Caderno2">Caderno 2</option>
                    <option value="Caderno3">Caderno 3</option>
                    <option value="Caderno4">Caderno 4</option>
                </select>
                <span id="spanSub" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Tipo:</td>
            <td>
                <select id="tipo" name="tipo">
                    <option value="tipo1">Tipo 1</option>
                    <option value="tipo2">Tipo 2</option>
                    <option value="tipo3">Tipo 3</option>
                    <option value="tipo4">Tipo 4</option>
                </select>
                <span id="spanSub" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>região:</td>
            <td>
                <select id="regiao" name="regiao">
                    <?php
                    $regioes = $objRegiaoDao->listaRegiao();

                    foreach ($regioes as $regiao) {
                        $selected = '';
                        if (isset($noticia) && $noticia['idRegiao'] == $regiao['idRegiao']) {
                            $selected = 'seleceted';
                        }
                        
                        echo '<option value="'.$regiao["idRegiao"].'">'.$regiao["nome"].'</option>';
                    }
                    ?>
                </select>
                <span id="spanSub" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Texto:</td>
            <td>
                <textarea type="text" name="texto" id="texto" cols="40" rows="8"><?php echo (isset($noticia)) ? $noticia['texto'] : ''; ?></textarea><br />
                <span id="spanFonte" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Foto de Capa:</td>
            <td><input type="file" id="foto" name="foto" /></td>
        </tr>
        <tr>
            <td>Crédito da Foto:</td>
            <td><input type="text" id="credito" name="credito" <?php echo (isset($noticia)) ? "value='" . $noticia['credito'] . "'" : ''; ?> /></td>
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
                    <option value="1" <?php echo (isset($noticia) && $noticia['status'] == 1) ? "selected" : ''; ?>>Habilitado</option>
                    <option value="2" <?php echo (isset($noticia) && $noticia['status'] == 2) ? "selected" : ''; ?>>Desabilitado</option>
                </select>
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