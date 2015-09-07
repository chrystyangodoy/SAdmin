//Autor: Victor Hugo
//Função responsável por exibir ou ocutar o feedback mensage
function showAlert(type, message) {
    if (message !== '') {
        if(type === ''){
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