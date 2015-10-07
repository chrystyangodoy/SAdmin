//Autor: Victor Hugo
//Função responsável por exibir ou ocutar o feedback mensage
function showAlert(type, message) {
    if (message !== '') {
        if (type === '') {
            type = 'success'
        }
        $('#alert').addClass('alert-' + type).html(message).fadeIn();
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
    $('#alert').fadeOut();
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
    $.getJSON("getEventoCategoriaPorEventoID.php",{ID_EVT_Evento : ID_EVT_Evento})
            .done(function (data) {
                return data;
            })
            .fail(function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
                alert('error', 'Ocorreu um erro durante a exercução da ação.\n\Desculpe o transtorno!');
            });
}