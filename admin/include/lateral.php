<?php
require_once '../model/banco.php';

$diretorio = $_SERVER['REQUEST_URI'];
$diretorio = explode('/', $diretorio);
?>

<script type="text/javascript">
    $(document).ready(function () {
<?php
if (array_search('noticias', $diretorio) == true) {
    //echo 'dasdadasdasdas ';
}

if (array_search('regiao', $diretorio) == true) {
    echo "$('.tgl1').css('display', 'block');";
    echo "$('.tgl2').css('display', 'none');";
    echo "$('.tgl3').css('display', 'none');";
    echo "$('.tgl4').css('display', 'none');";
}

if (array_search('agenda', $diretorio) == true) {
    echo "$('.tgl3').css('display', 'block');";
    echo "$('.tgl1').css('display', 'none');";
    echo "$('.tgl2').css('display', 'none');";
    echo "$('.tgl4').css('display', 'none');";
}
?>
        $('span', '.hasub').click(function () {
            $(this).next().slideToggle('slow').siblings('.tgl:visible').slideToggle('fast');
        });
    });
</script>

<aside class="barra-lateral" id="barra-lateral">
    <ul>
        <li><a href="../noticias" <?php
            if (array_search('noticias', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-newspaper"></i> Notícias</a></li>
        <li><a href="../releases/" <?php
            if (array_search('releases', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-newspaper"></i> Região</a></li>
        <li><a href="../destaques" <?php
            if (array_search('destaques', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-tv"></i> Agenda</a></li>

    </ul>
</aside>