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
                    url = 'ParticipanteAcompanhamento.php?cpf=' + cpf + '&ID_Evento=' + $('#AcompanhamentoEVTID').val();
                    ;
                    $(location).attr('href', url);
                }
            }
        });


    } else {
        showAlert('error', 'CPF Incorreto!');
    }
    $("#loadImg").css("display", "none").fadeOut();
}

function ListaBoletosPopUp(ID_EVT_Evento_Pariticipante, ID_EVT_Pagamento_Pai) {

    $('#myModal').modal('show');
    $('#conteudoTabelaBoletos').empty();
    $('.modal-title').empty();
    $('.modal-title').append("Lista de Boletos");

    $.getJSON("getBoletoList.php", {ID_EVT_Evento_Pariticipante: ID_EVT_Evento_Pariticipante, ID_EVT_Pagamento_Pai: ID_EVT_Pagamento_Pai}, function (data) {
        $.each(data, function (index, item) {
            $('#conteudoTabelaBoletos')
                    .append(
                            "<tr>" +
                            "<td>" + item.DSC_Nome + "</td>" +
                            "<td>" + item.Num_Parcelas + "</td>" +
                            "<td class='formatcurrency'>" + item.VLR_Transacao + "</td>" +
                            "<td>" + "<a href='Boleto.php?ID_EVT_Evento_Pariticipante="
                            + item.ID_EVT_Evento_Pariticipante + "&ID_EVT_Pagamento_Pai=" +
                            item.ID_Pagamento + "' target='_blank' class='btn btn-primary' title='Clique para gerar o Boleto.'>" +
                            "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            "</a>" +
                            "</tr>"
                            );
        });

        $('.formatcurrency').formatCurrency();
    });

}

function ListaArtigoPopUp(ID_EVT_Evento_Pariticipante) {

    $('#myModal_Artigo').modal('show');
    $('#conteudoTabelaArtigo').empty();
    $('.modal-title').empty();
    $('.modal-title').append("Submissão de Artigo");

    $.getJSON("getArtigoList.php", {ID_EVT_Evento_Pariticipante: ID_EVT_Evento_Pariticipante}, function (data) {
        $.each(data, function (index, item) {
            $('#conteudoTabelaArtigo')
                    .append(
                            "<tr>" +
                            "<td>" + item.Nome_Docto + "</td>" +
                            "<td>" + item.Assunto + "</td>" +
                            "<td>" + item.Parecer + "</td>" +
                            "<td>" + item.Documento + "</td>" +
                            "<td>" + item.Data_Envio + "</td>" +
                            "<td>" + item.Idioma_Documento + "</td>" +
                            //"<td>" + "<a href='Boleto.php?ID_EVT_Evento_Pariticipante="
                            //+ item.ID_EVT_Evento_Pariticipante + "&ID_EVT_Pagamento_Pai=" +
                            //item.ID_Pagamento + "' target='_blank' class='btn btn-primary' title='Clique para gerar o Boleto.'>" +
                            //"<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            //"</a>" +
                            "</tr>"
                            );
        });

        $('.formatcurrency').formatCurrency();
    });

}