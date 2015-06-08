function delRegiao(id){
    if(confirm("Você tem certeza que deseja excluir essa região") === true){
        $.post('../control/controleRegiao.php',{opcao:'delRegiao',idRegiao:id},
        function(r){
            console.log(r);
            $("#listaRegiao").load('listaRegiaoAjax.php');
            
        })
    }
}
$(document).ready(function(){
    if($("#listaRegiao").length){
        $("#listaRegiao").load('listaRegiaoAjax.php');
    }
    
    $("#btnCadRegiao").click(function(){
        var nome = $("#nome").val();
        var texto = $("#texto").val();
        var imagem = $("#imagem").val();
        var informacoes = $("#informacoes").val();
        var status = $("#status").val();
        
        $(".erro").html('').css('display', 'none');
        if(nome == ''){
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        }else if(texto == ''){
            $("#texto").focus();
            $("#spanTexto").html('Você deve preencher o Texto!').css('display', 'inline-block');
        }else if(imagem == ''){
            $("#imagem").focus();
            $("#spanImagem").html('Você deve selecionar a Imagem!').css('display', 'inline-block');
        }else if(informacoes == ''){
            $("#informacoes").focus();
            $("#spanInformacoes").html('Você deve selecionar a imagem de Informações!').css('display', 'inline-block');
        }else if(status == ''){
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar um Status!').css('display', 'inline-block');
        }else{
            $("#frmCadRegiao").submit();
        }
    });
    
    $("#btnAltRegiao").click(function(){
        var nome = $("#nome").val();
        var texto = $("#texto").val();
        var imagem = $("#imagem").val();
        var informacoes = $("#informacoes").val();
        var status = $("#status").val();
        
        $(".erro").html('').css('display', 'none');
        if(nome == ''){
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        }else if(texto == ''){
            $("#texto").focus();
            $("#spanTexto").html('Você deve preencher o Texto!').css('display', 'inline-block');
        }else if(status == ''){
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar um Status!').css('display', 'inline-block');
        }else{
            $("#frmAltRegiao").submit();
        }
    });
})