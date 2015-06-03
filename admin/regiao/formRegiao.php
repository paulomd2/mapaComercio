<?php
if (isset($_GET['id'])) {
    require_once '../model/regiaoDao.php';

    $idRegiao = $_GET['id'];

    $objRegiao->setIdRegiao($idRegiao);

    $regiao = $objRegiaoDao->verRegiao1($objRegiao);
}
?>
<form name="<?php echo (isset($noticia)) ? 'cadRegiao' : 'altRegiao' ?>">
    <input type="hidden" value="<?php echo $_GET['mercado']; ?>" id="mercado"/>
    <table class="tableform">
        <tr>
            <td>Nome:</td>
            <td>
                <input type="text" name="nome" id="nome" <?php echo (isset($regiao)) ? "value='" . $regiao['nome'] . "'" : ''; ?>  /><br />
                <span id="spanNome" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Texto:</td>
            <td>
                <textarea type="text" name="texto" id="texto" cols="40" rows="8"><?php echo (isset($regiao)) ? $regiao['texto'] : ''; ?></textarea><br />
                <span id="spanFonte" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Imagem:</td>
            <td>
                <input type="file" id="foto" name="foto" /><br />
                <span id="spanInformacoes" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Informações:</td>
            <td>
                <input type="file" name="informacoes" id="informacoes" /><br />
                <span id="spanInformacoes" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>
                <select id="status" name="status">
                    <option>Selecione uma região...</option>
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