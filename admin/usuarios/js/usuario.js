$.validaEmail = function (email) {
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
}

function verificaEmail(email) {
    var resposta = 0;

    $.ajax({
        url: 'control/controleUsuario.php',
        async: false,
        type: 'POST',
        data: {
            opcao: 'verificaEmail',
            email: email
        },
    }).done(function (r) {
        resposta = r;
    });

    return resposta;
}


function verificaUsuario(usuario) {
    var resposta = 0;

    $.ajax({
        url: 'control/controleUsuario.php',
        async: false,
        type: 'POST',
        data: {
            opcao: 'verificaUsuario',
            usuario: usuario
        },
    }).done(function (r) {
        console.log(r);
        resposta = r;
    });

    return resposta;
}

function delUsuario(id) {
    if (confirm('Você tem certeza que deseja excluir esse usuário?')) {
        $.post('control/controleUsuario.php', {opcao: 'deletar', idUsuario: id});
        $("#listaUsuarios").load("listaUsuariosAjax.php?count=" + count);
    }
}

function deslogar() {
    $.post('control/controleUsuario.php', {opcao: 'deslogar'});
    window.location = '../';
}

$(document).ready(function () {

    url = document.URL;
    split = url.split('/');
    count = split.length-2;
    pagina = split[count];

    count = '';
    if (split[split.length] == 'verUsuarios.php' || split[split.length - 1] == 'verUsuarios.php') {
        count = 500;
    } else {
        count = 5;
    }
    
    
    if (localStorage.nivel != 1 && pagina == 'usuarios') {
        window.location = '../home';
    }

    $("#listaUsuarios").load("listaUsuariosAjax.php?count=" + count);

    $("#btnCadastrarUsuario").click(function () {
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();
        var senha = $("#senha").val().trim();
        var usuario = $("#usuario").val().trim();
        var nivel = $("#nivel").val();
        var status = $("#status").val();

        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!').css('display', 'inline-block');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!').css('display', 'inline-block');
        } else if (verificaEmail(email) >= 1) {
            $("#email").focus();
            $("#spanEmail").html('Este email já está cadastrado!').css('display', 'inline-block');
        } else if (usuario == '') {
            $("#usuario").focus();
            $("#spanUsuario").html('Você deve preencher o Usuário!').css('display', 'inline-block');
        } else if (verificaUsuario(usuario) > 0) {
            $("#usuario").focus();
            $("#spanUsuario").html('Este usuário já está cadastrado!').css('display', 'inline-block');
        } else if (senha == '') {
            $("#senha").focus();
            $("#spanSenha").html('Você deve preencher a Senha!').css('display', 'inline-block');
        } else if (nivel == '') {
            $("#nivel").focus();
            $("#spanNivel").html('Você deve selecionar o Nível!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!').css('display', 'inline-block');
        } else {
            $.post('control/controleUsuario.php', {opcao: 'cadastrar', nome: nome, email: email, senha: senha, usuario: usuario, nivel: nivel, status: status});
        }
    });
    $("#btnAlterarUsuario").click(function () {
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();
        var senhaDigitada = $("#senha").val().trim();
        var senhaAntiga = $("#senhaAntiga").val().trim();
        var senha;
        var usuario = $("#usuario").val().trim();
        var nivel = $("#nivel").val();
        var idUsuario = $("#idUsuario").val();
        var status = $("#status").val();
        if (senhaDigitada == '') {
            senha = senhaAntiga;
        } else {
            senha = senhaDigitada;
        }

        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!').css('display', 'inline-block');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!').css('display', 'inline-block');
        } else if (usuario == '') {
            $("#usuario").focus();
            $("#spanUsuario").html('Você deve preencher o Usuário!').css('display', 'inline-block');
        } else if (nivel == '') {
            $("#nivel").focus();
            $("#spanNivel").html('Você deve preencher o Nível!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!').css('display', 'inline-block');
        } else {
            $.post('control/controleUsuario.php', {opcao: 'alterar', idUsuario: idUsuario, usuario: usuario, nome: nome, email: email, senha: senha, senhaAntiga: senhaAntiga, nivel: nivel, status: status});
            window.location = 'verUsuarios.php';
        }
    });

    $("#btnAlterarUsuarioHome").click(function () {
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();
        var senhaDigitada = $("#senha").val().trim();
        var senhaAntiga = $("#senhaAntiga").val().trim();
        var senha;
        var usuario = $("#usuario").val().trim();
        var idUsuario = $("#idUsuario").val();
        var nivel = $("#nivel").val();
        if (senhaDigitada == '') {
            senha = senhaAntiga;
        } else {
            senha = senhaDigitada;
        }

        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!').css('display', 'inline-block');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!').css('display', 'inline-block');
        } else if (usuario == '') {
            $("#usuario").focus();
            $("#spanUsuario").html('Você deve preencher o Usuário!').css('display', 'inline-block');
        } else {
            $.post('../usuarios/control/controleUsuario.php', {opcao: 'alterar', idUsuario: idUsuario, usuario: usuario, nome: nome, email: email, senha: senha, senhaAntiga: senhaAntiga, nivel: nivel},
            function (r) {
                console.log(r);
            });
            //window.location = './';
        }
    });
});