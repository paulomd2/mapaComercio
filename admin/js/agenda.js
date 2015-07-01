function delAgenda(id){
    if(confirm('Você tem certeza que deseja excluir esse evento?') === true){
        $.post('../control/controleAgenda.php',{opcao:'delAgenda', idAgenda:id},
        function(r){
            console.log(r);
            $("#listaAgenda").load('listaAgendaAjax.php');
        })
    }
}

$(document).ready(function(){
    if($("#listaAgenda").length){
        $("#listaAgenda").load('listaAgendaAjax.php');
    }
    
    $("#btnCadAgenda").click(function(){
        var data = $("#data").val().trim();
        var cidade = $("#cidade").val().trim();
        var local = $("#local").val().trim();
        var presidente = $("#presidente").val().trim();
        var regiao = $("#regiao").val();
        var status = $("#status").val();
        
        $(".erro").html('').css('display', 'none');
        if (data == '') {
            $("#data").focus();
            $("#spanData").html('Você deve preencher a Data!').css('display', 'inline-block');
        }else if (cidade == '') {
            $("#cidade").focus();
            $("#spanCidade").html('Você deve preencher a Cidade!').css('display', 'inline-block');
        }else if (local == '') {
            $("#local").focus();
            $("#spanLocal").html('Você deve preencher o Local!').css('display', 'inline-block');
        }else if (presidente == '') {
            $("#presidente").focus();
            $("#spanPresidente").html('Você deve preencher o Presidente!').css('display', 'inline-block');
        }else if (regiao == '') {
            $("#regiao").focus();
            $("#spanRegiao").html('Você deve selecionar uma Região!').css('display', 'inline-block');
        }else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar um Status!').css('display', 'inline-block');
        }else{
            $.post('../control/controleAgenda.php',{opcao:'cadRegiao', data:data, cidade:cidade, local:local, presidente:presidente, regiao:regiao, status:status},
            function(r){
                console.log(r);
            })
        }
    });
    
    $("#btnAltAgenda").click(function(){
        var data = $("#data").val().trim();
        var cidade = $("#cidade").val().trim();
        var local = $("#local").val().trim();
        var presidente = $("#presidente").val().trim();
        var regiao = $("#regiao").val();
        var status = $("#status").val();
        var idAgenda = $("#idAgenda").val();
        var status = $("#status").val();
        
        $(".erro").html('').css('display', 'none');
        if (data == '') {
            $("#data").focus();
            $("#spanData").html('Você deve preencher a Data!').css('display', 'inline-block');
        }else if (cidade == '') {
            $("#cidade").focus();
            $("#spanCidade").html('Você deve preencher a Cidade!').css('display', 'inline-block');
        }else if (local == '') {
            $("#local").focus();
            $("#spanLocal").html('Você deve preencher o Local!').css('display', 'inline-block');
        }else if (presidente == '') {
            $("#presidente").focus();
            $("#spanPresidente").html('Você deve preencher o Presidente!').css('display', 'inline-block');
        }else if (regiao == '') {
            $("#regiao").focus();
            $("#spanRegiao").html('Você deve selecionar uma Região!').css('display', 'inline-block');
        }else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar um Status!').css('display', 'inline-block');
        }else{
            $.post('../control/controleAgenda.php',{opcao:'altRegiao', idAgenda:idAgenda, data:data, cidade:cidade, local:local, presidente:presidente, regiao:regiao, status:status},
            function(r){
                console.log(r);
            })
        }
    });
});