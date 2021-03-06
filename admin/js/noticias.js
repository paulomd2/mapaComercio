function paginacao(pagina) {
    var count = $("#numNoticias").val();

    $("#listaNoticias").load('listaNoticiasAjax.php?count=' + count + '&pagina=' + pagina);
}

function delNoticia(id) {
    if (confirm("Você tem certeza que deseja excluir essa notícia?") == true) {
        $.post('../control/controleNoticias.php', {opcao: 'excluir', idNoticia: id});

        $("#listaNoticias").load('listaNoticiasAjax.php?count=' + count);
    }
}


function delNoticiaBusca(id, busca) {
    if (confirm("Você tem certeza que deseja excluir essa notícia?") == true) {
        $.post('../noticias/control/controleNoticias.php', {opcao: 'excluir', idNoticia: id});

        $(".tableAll").load('listaBuscaAjax.php?modulo=noticias&busca=' + busca);
    }
}
$(document).ready(function () {
    var url = document.URL;
    var split = url.split('/');
    var pagina = split[split.length - 1];

    count = '';
    if (pagina == 'verNoticias.php') {
        count = 10;
    } else {
        count = 5;
    }

    var data = new Date();
    var dia = data.getDate();
    var mes = data.getMonth() + 1;
    mes = '0' + mes;
    var ano = data.getFullYear();
    if ($("#publicacao").val() == '') {
        $("#publicacao").val(ano + '-' + mes + '-' + dia);
    }

    if ($("#listaNoticias").length) {
        $("#listaNoticias").load('listaNoticiasAjax.php?count=10');
    }
//    $("#listaNoticias").load('listaNoticiasAjax.php');

    $("#btnCadastrar").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#subtitulo").val().trim();
        var caderno = $("#caderno").val();
        var tipo = $("#tipo").val();
        var regiao = $("#regiao").val();
        var texto = CKEDITOR.instances.texto.getData();
        var foto = $("#foto").val().trim();
        var creditoFoto = $("#credito").val().trim();
        var dataPublicacao = $("#publicacao").val();
        var status = $("#status").val();

        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (subtitulo == '') {
            $("#subtitulo").focus();
            $("#spanSubtitulo").html('Você deve preencher o Subtítulo!').css('display', 'inline-block');
        } else if (caderno == '') {
            $("#caderno").focus();
            $("#spanCaderno").html('Você deve selecionar um Caderno!').css('display', 'inline-block');
        } else if (tipo == '') {
            $("#tipo").focus();
            $("#spanTipo").html('Você deve selecionar um Tipo!').css('display', 'inline-block');
        } else if (regiao == '') {
            $("#regiao").focus();
            $("#spanRegiao").html('Você deve selecionar uma Região!').css('display', 'inline-block');
        } else if (texto == '') {
            texto.focus;
            $("#spanTexto").html('Você deve preencher o texto!').css('display', 'inline-block');
        } else if (foto == '') {
            $("#foto").focus();
            $("#spanFoto").html('Você deve selecionar uma Foto!').css('display', 'inline-block');
        } else if (creditoFoto == '') {
            $("#credito").focus();
            $("#spanCredito").html('Você deve preencher o crédito da Foto!').css('display', 'inline-block');
        } else if (dataPublicacao == '') {
            $("#publicacao").focus();
            $("#spanPublicacao").html('Você deve preencher selecionar uma Data').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar um Status!').css('display', 'inline-block');
        } else {
//            $.post('control/controleNoticias.php', {opcao: 'cadastrar', titulo: titulo, subtitulo: subtitulo, caderno:caderno, tipo:tipo, regiao:regiao, dataPublicacao: dataPublicacao, texto: texto,  status: status});
//            window.location = 'verNoticias.php';

            $("#frmCadNoticia").submit();
        }
    });

    $("#btnAlterar").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#subtitulo").val().trim();
        var caderno = $("#caderno").val();
        var tipo = $("#tipo").val();
        var regiao = $("#regiao").val();
        var texto = CKEDITOR.instances.texto.getData();
        var creditoFoto = $("#credito").val().trim();
        var dataPublicacao = $("#publicacao").val();
        var status = $("#status").val();

        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (subtitulo == '') {
            $("#subtitulo").focus();
            $("#spanSubtitulo").html('Você deve preencher o Subtítulo!').css('display', 'inline-block');
        } else if (caderno == '') {
            $("#caderno").focus();
            $("#spanCaderno").html('Você deve selecionar um Caderno!').css('display', 'inline-block');
        } else if (tipo == '') {
            $("#tipo").focus();
            $("#spanTipo").html('Você deve selecionar um Tipo!').css('display', 'inline-block');
        } else if (regiao == '') {
            $("#regiao").focus();
            $("#spanRegiao").html('Você deve selecionar uma Região!').css('display', 'inline-block');
        } else if (texto == '') {
            texto.focus;
            $("#spanTexto").html('Você deve preencher o texto!').css('display', 'inline-block');
        } else if (creditoFoto == '') {
            $("#credito").focus();
            $("#spanCredito").html('Você deve preencher o crédito da Foto!').css('display', 'inline-block');
        } else if (dataPublicacao == '') {
            $("#publicacao").focus();
            $("#spanPublicacao").html('Você deve preencher selecionar uma Data').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar um Status!').css('display', 'inline-block');
        } else {
//            $.post('control/controleNoticias.php', {opcao: 'cadastrar', titulo: titulo, subtitulo: subtitulo, caderno:caderno, tipo:tipo, regiao:regiao, dataPublicacao: dataPublicacao, texto: texto,  status: status});
//            window.location = 'verNoticias.php';

            $("#frmAltNoticia").submit();
        }
    });

    $("#numNoticias").change(function () {
        var limite = $("#numNoticias").val();

        $("#listaNoticias").load('listaNoticiasAjax.php?count=' + limite);
    });
});