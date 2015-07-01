<?php
require_once '../model/regiaoDao.php';

if (isset($_GET['id'])) {
    require_once '../model/agendaDao.php';

    $objAgenda->setIdAgenda($_GET['id']);

    $agenda = $objAgendaDao->verAgenda1($objAgenda);
}
?>
<form id="<?php echo (isset($agenda)) ? 'frmAltAgenda' : 'frmCadAgenda' ?>">
    <?php
    if(isset($agenda)){
        echo '<input type="hidden" value="'.$agenda["idAgenda"].'" name="idAgenda" id="idAgenda" />';
    }
    ?>
    <table class="tableform">
        <tr>
            <td>data:</td>
            <td>
                <input type="date" name="data" id="data" <?php echo (isset($agenda)) ? "value='" . $agenda['data'] . "'" : ''; ?> /><br />
                <span id="spanData" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Cidade:</td>
            <td>
                <input type="text" name="cidade" id="cidade" <?php echo (isset($agenda)) ? "value='" . $agenda['cidade'] . "'" : ''; ?>  /><br />
                <span id="spanCidade" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Local:</td>
            <td>
                <input type="text" id="local" name="local" <?php echo (isset($agenda)) ? 'value="'.$agenda['local'].'"' : ''; ?>" /><br />
                <span id="spanLocal" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Presidente:</td>
            <td>
                <input type="text" name="presidente" id="presidente" <?php echo (isset($agenda)) ? 'value="'.$agenda['presidente'].'"' : ''; ?> /><br />
                <span id="spanPresidente" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td>Região:</td>
            <td>
                <select id="regiao" name="regiao">
                    <option value="">Selecione uma Região...</option>
                    <?php
                    $regioes = $objRegiaoDao->listaRegiao();

                    foreach ($regioes as $regiao) {
                        $selected = '';
                        if (isset($agenda) && $agenda['idRegiao'] == $regiao['idRegiao']) {
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
            <td>Status:</td>
            <td>
                <select id="status" name="status">
                    <option value="">Selecione um Status...</option>
                    <option value="1" <?php echo (isset($agenda) && $agenda['status'] == 1) ? "selected" : ''; ?>>Habilitado</option>
                    <option value="2" <?php echo (isset($agenda) && $agenda['status'] == 2) ? "selected" : ''; ?>>Desabilitado</option>
                </select><br />
                <span id="spanStatus" class="erro"></span>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" id="<?php echo (isset($agenda)) ? 'btnAltAgenda' : 'btnCadAgenda' ?>" value="<?php echo (isset($agenda)) ? 'Alterar' : 'Cadastrar' ?>" /></td>
        </tr>
    </table>
</form>