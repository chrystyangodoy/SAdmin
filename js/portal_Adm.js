//function updatePagto(form) {
function updatePagto(ID_Pagamento, COD_Tipo_Situacao_Pagamento) {
    //alert("Atualizando");
    var CodSituacao = $('#' + COD_Tipo_Situacao_Pagamento).val();
    $.getJSON("getStatusPagtoEventoID.php", {ID_Pagamento: ID_Pagamento, COD_Tipo_Situacao_Pagamento: CodSituacao}, function (data) {
        showAlert('', 'Atualizado!');
    });
    // $('#conteudoParticEvento').re
}

function OnclickAcompanhamento(ID_EVT_Evento, DSC_Nome) {
    $('#myModal').modal('show');
    $('#conteudoParticEvento').empty();
    $('.modal-title').empty();
    $('.modal-title').append(DSC_Nome);
    $.getJSON("getParticipanteEventoID.php", {ID_EVT_Evento: ID_EVT_Evento}, function (data) {
        $.each(data, function (index, item) {

            $('#conteudoParticEvento')
                    .append(
                            "<tr id=Linha" + index + ">" +
                            "<td>" + item.DSC_Nome_Crachav + "</td>" +
                            "<td class='formatcurrency'>" + item.VLR_Total_Inscricao + "</td>" +
                            "<td>" +
                            "<input type='hidden' class='form-control' name='ID_Pagamento' id='ID_Pagamento' value='" + item.ID_Pagamento + "'>" +
                            "<select id='COD_Tipo_Situacao_Pagamento" + index + "' class='situacao' onchange = updatePagto('" + item.ID_Pagamento + "','COD_Tipo_Situacao_Pagamento" + index + "')>" +
                            "<option value='1'>1 - Cortesia</option>" +
                            "<option value='2'>2 - Baixa</option>" +
                            "</select>" +
                            "</td>" +
                            "</tr>"
                            );
        });
    });
}

function OnclickAcompParticpante(ID_BSC_Participante, DSC_Nome) {
    $('#myModal').modal('show');
    $('#conteudoPartic').empty();
    $('.modal-title').empty();
    $('.modal-title').append(DSC_Nome);
    $.getJSON("getPagtoParticipanteID.php", {ID_BSC_Participante: ID_BSC_Participante}, function (data) {
        $.each(data, function (index, item) {
            if (item.COD_Tipo_Situacao_Pagamento == 0) {
                $varStatus = "Parcela não Confirmada";
                $varDisableBN = "";
                $varDisableBC = "";
                $varDisableCB = "";
            } else if (item.COD_Tipo_Situacao_Pagamento == 1) {
                $varStatus = "Parcela Confirmada";
                $varDisableBN = "disabled";
                $varDisableBC = "";
                $varDisableCB = "";
            } else if (item.COD_Tipo_Situacao_Pagamento == 2) {
                $varStatus = "Parcela Cortesia";
                $varDisableBN = "";
                $varDisableBC = "disabled";
                $varDisableCB = "";
            } else {
                $varStatus = "Parcela Baixa Cancelada";
                $varDisableBN = "";
                $varDisableBC = "";
                $varDisableCB = "disabled";
            }

            $('#conteudoPartic')
                    .append(
                            "<tr>" +
                            "<td>" + item.DSC_Nome + "</td>" +
                            "<td>" + item.Num_Inscricao + "</td>" +
                            "<td class='formatcurrency'>" + item.VLR_Transacao + "</td>" +
                            "<td>" + $varStatus + "</td>" +
                            "<td width='26%'><a margin='10px' href='setStatusPagamento.php?ID_Pagamento="
                            + item.ID_Pagamento + "&Confirm=1'" +
                            " class='btn btn-default' title='Baixa Normal.'"+$varDisableBN+">" +
                            "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            "</a>" +
                            "<a href='setStatusPagamento.php?ID_Pagamento="
                            + item.ID_Pagamento + "&Confirm=2'" +
                            " class='btn btn-default' title='Baixa Cortesia.'"+$varDisableBC+">" +
                            "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            "</a>" +
                            "<a href='setStatusPagamento.php?ID_Pagamento="
                            + item.ID_Pagamento + "&Confirm=3'" +
                            " class='btn btn-danger' title='Cancelar Baixa.'"+$varDisableCB+">" +
                            "<span class='glyphicon glyphicon glyphicon-remove' aria-hidden='true'></span>" +
                            "</a></td>" +
                            //"<td><input type='hidden' class='form-control' name='ID_Pagamento' id='ID_Pagamento' value='" + item.ID_Pagamento + "'>" +
                            //"<select id='COD_Tipo_Situacao_Pagamento" + index + "' class='COD_Tipo_Situacao_Pagamento' onchange = updatePagto('" + item.ID_Pagamento + "','COD_Tipo_Situacao_Pagamento" + index + "')>" +
                            //"<option value='0'>--</option>" +
                            //"<option value='0'>0 - Não Pago</option>" +
                            //"<option value='1'>1 - Cortesia</option>" +
                            //"<option value='2'>2 - Baixa</option>" +
                            //"</select></td>" +
                            "</tr>"
                            );

        });
    });


}

function ListaCursosParticPopUp(ID_EVT, ID_Participante) {

    $('#myModal_Cursos').modal('show');
    $('#CursosParticipante').empty();
    $('.modal-title').empty();
    $('.modal-title').append("Inscrições - Cursos");

    $.getJSON("getCursoPartList.php", {ID_EVT: ID_EVT, ID_Participante: ID_Participante}, function (data) {
        $.each(data, function (index, item) {
            if (item.Status == 0) {
                $varStatus = "Inscrição não Confirmada";
                $varDisableConfirm = "";
                $varDisableCancela = "";

            } else if (item.Status == 1) {
                $varStatus = "Inscrição Confirmada";
                $varDisableConfirm = "disabled";
                $varDisableCancela = "";
            } else {
                $varStatus = "Inscrição Cancelada";
                $varDisableConfirm = "";
                $varDisableCancela = "disabled";
            }


            $('#CursosParticipante')
                    .append(
                            "<tr>" +
                            "<td hidden=''>" + item.ID_Curso + "</td>" +
                            "<td>" + item.Curso + "</td>" +
                            "<td>" + item.TituloCurso + "</td>" +
                            "<td>" + item.Data_Hora + "</td>" +
                            "<td class='formatcurrency'>" + item.Valor_Curso + "</td>" +
                            "<td>" + $varStatus + "</td>" +
                            "<td>" + "<a href='setStatusCursoParticipante.php?ID_EVT_Curso_Participante="
                            + item.ID_EVT_Curso_Participante + "&Confirm=1'" +
                            " class='btn btn-primary' title='Confirmar Inscrição.'"
                            + $varDisableConfirm + ">" +
                            "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            "</a></td>" +
                            "<td>" + "<a href='setStatusCursoParticipante.php?ID_EVT_Curso_Participante="
                            + item.ID_EVT_Curso_Participante + "&Confirm=2'" +
                            " class='btn btn-primary' title='Cancelar Inscrição.'" + $varDisableCancela + ">" +
                            "<span class='glyphicon glyphicon glyphicon-remove' aria-hidden='true'></span>" +
                            "</a></td>" +
                            "</tr>"
                            );
        });
        $('.formatcurrency').formatCurrency();
    });

}