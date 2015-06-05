<?php
if (isset($_GET['id'])) {
    require_once '../model/regiaoDao.php';

    $idRegiao = $_GET['id'];

    $objRegiao->setIdRegiao($idRegiao);

    $regiao = $objRegiaoDao->verRegiao1($objRegiao);
}
?>
<form id="<?php echo (isset($regiao)) ? 'frmAltRegiao' : 'frmCadRegiao' ?>" action="../control/controleRegiao.php" method="post" enctype="multipart/form-data">
    <?php
    if(isset($regiao)){
        echo '<input type="hidden" value="altRegiao" name="opcao" id="opcao" />
              <input type="hidden" value="'.$regiao["idRegiao"].'" name="idRegiao" id="idRegiao" />
              <input type="hidden" value="'.$regiao["imagem"].'" name="imagemAntiga" id="imagemAntiga" />
              <input type="hidden" value="'.$regiao["informacoes"].'" name="informacoesAntiga" id="informacoesAntiga" />
             ';
    }else{
        echo '<input type="hidden" value="cadRegiao" name="opcao" id="opcao">';
    }
    ?>
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
                <span id="spanTexto" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Imagem:</td>
            <td>
                <input type="file" id="imagem" name="imagem" /><br />
                <span id="spanImagem" class="erro"></span>
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
                    <option value="">Selecione uma região...</option>
                    <option value="1" <?php echo (isset($regiao) && $regiao['status'] == 1) ? "selected" : ''; ?>>Habilitado</option>
                    <option value="2" <?php echo (isset($regiao) && $regiao['status'] == 2) ? "selected" : ''; ?>>Desabilitado</option>
                </select><br />
                <span id="spanStatus" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" id="<?php echo (isset($regiao)) ? 'btnAltRegiao' : 'btnCadRegiao' ?>" value="<?php echo (isset($regiao)) ? 'Alterar' : 'Cadastrar' ?>" /></td>
        </tr>
    </table>
</form>