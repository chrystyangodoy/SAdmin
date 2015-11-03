//Autor: Victor Hugo
//Função responsável por exibir ou ocutar o feedback mensage
function showAlert(type, message) {
    if (message !== '') {
        if (type === '') {
            type = 'success';
        }
        $('#alert').removeClass();
        $('#alert').addClass('alert-' + type).html(message).slideDown();
        setTimeout("closeAlert()", 15000); // 15 segundos
    }
}

//chama a função para fechar o alerta quando clicado.
$(function () {
    $('#alert').click(function () {
        closeAlert();
    });
});
//
function closeAlert() {
    $('#alert').slideUp();
    $('#alert').removeClass();
}

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}
function isCPFCadastrado(cpf) {
    resultado = 0;
    $.ajax({
        url: "getCPFCasdastrado.php",
        data: {cpf: cpf},
        type: "POST",
        async: false,
        success: function (data) {
            resultado = data;
        }
    });
    return resultado;
}

function isCPFCadastradoEvento(cpf, evento) {
    resultado = 0;
    $.ajax({
        url: "getCPFCasdastradoEvento.php",
        data: {cpf: cpf, eventoID: evento},
        type: "POST",
        async: false,
        success: function (data) {
            resultado = data;
        }
    });
    return resultado;
}

function isCPFCadastradoEdit(cpf, idParticipante) {
    resultado = 0;
    $.ajax({
        url: "getCPFCasdastradoEdit.php",
        data: {cpf: cpf, ID_Participante: idParticipante},
        type: "POST",
        async: false,
        success: function (data) {
            resultado = data;
        }
    });
    return resultado;
}

function getEventoCategoriaPorEventoID(ID_EVT_Evento) {
    $.getJSON("getEventoCategoriaPorEventoID.php", {ID_EVT_Evento: ID_EVT_Evento})
            .done(function (data) {
                return data;
            })
            .fail(function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
                alert('error', 'Ocorreu um erro durante a exercução da ação.\n\Desculpe o transtorno!');
            });
}

function CPFValido(cpf) {
    cpf = jQuery.trim(cpf);

    cpf = cpf.replace('.', '');
    cpf = cpf.replace('.', '');
    cpf = cpf.replace('-', '');
    while (cpf.length < 11)
        cpf = "0" + cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9)
            b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) {
        a[9] = 0
    } else {
        a[9] = 11 - x
    }
    b = 0;
    c = 11;
    for (y = 0; y < 10; y++)
        b += (a[y] * c--);
    if ((x = b % 11) < 2) {
        a[10] = 0;
    } else {
        a[10] = 11 - x;
    }
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg))
        return false;
    return true;
}

function FormataDataBR(dataUS) {
    v_split = dataUS.split("-");
    dataBR = v_split[2] + "/" + v_split[1] + "/" + v_split[0]
    return dataBR;
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}