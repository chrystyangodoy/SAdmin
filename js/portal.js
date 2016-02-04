function ListaEventoCategoriaPopUp(ID_EVT_Evento, DSC_Nome) {

    $('#myModal').modal('show');
    $('#conteudoTabelaCategoria').empty();
    $('.modal-title').empty();
    $('.modal-title').append(DSC_Nome);


    $.getJSON("getEventoCategoriaPorEventoID.php", {ID_EVT_Evento: ID_EVT_Evento}, function (data) {
        $.each(data, function (index, item) {
            $('#conteudoTabelaCategoria')

                    .append(
                            "<tr>" +
                            "<td>" + item.DSC_Nome + "</td>" +
                            "<td class='formatcurrency'>" + item.VLR_Inscricao + "</td>" +
                            "<td>" + FormataDataBR(item.DT_Inicio_Valor) + "</td>" +
                            "<td>" + FormataDataBR(item.DT_Fim_Valor) + "</td>" +
                            "<td>" + "<a href='ParticipanteInsert.php?ID_Evento_Categoria="
                            + item.ID_Evento_Categoria + "&ID_EVT_Evento=" +
                            item.ID_EVT_Evento + "' class='btn btn-warning' title='Clique para selecionar esta Categoria'>" +
                            "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            "</a>" +
                            "</tr>"
                            );
        });

        $('.formatcurrency').formatCurrency();
    });

}

function AcompanharPopUp(ID_EVT_Evento, DSC_Nome) {
    $('#modalAcompanhamento').modal('show');
    $('#AcompanhamentoEVTID').val(ID_EVT_Evento);
    $('#NomeEventoAcompanhamento').empty();
    $('#NomeEventoAcompanhamento').append(DSC_Nome);
    $('#AcompanhamentoCPF').val('');
}

function OnclickAcompanhamento() {
    $("#loadImg").css("display", "block").fadeIn();
    cpf = $('#AcompanhamentoCPF').val();
    id_evento = $('#AcompanhamentoEVTID').val();
    resultado = 0;
    if (CPFValido(cpf)) {

        $.ajax({
            url: "getCPFCasdastrado.php",
            data: {cpf: cpf, ID_Evento: id_evento},
            type: "POST",
            success: function (data) {
                console.log(data);
                resultado = data;
                console.log(resultado);
                if (data == 1) {
                    showAlert('error', 'CPF não cadastrado para este Evento');
                } else {
                    showAlert('', 'SUMIT');
                    url = 'ParticipanteAcompanhamento.php?cpf='+cpf+'&ID_Evento='+$('#AcompanhamentoEVTID').val();;
                    $(location).attr('href',url);
                }
            }
        });


    } else {
        showAlert('error', 'CPF Incorreto!');
    }
    $("#loadImg").css("display", "none").fadeOut();
}
