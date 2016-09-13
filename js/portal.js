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
                            "</a>"+
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

function ListaCursosPopUp(ID_EVT) {
    $('#myModal_Cursos').modal('show');
    $('#conteudoTabelaCursos').empty();
    $('.modal-title').empty();
    $('.modal-title').append("Cursos Disponíveis");

    $.getJSON("getCursosList.php", {ID_EVT: ID_EVT}, function (data) {
        $.each(data, function (index, item) {
            $('#conteudoTabelaCursos')
                    .append(
                            "<tr>" +
                            "<td hidden=''>" + item.ID_Curso + "</td>" +
                            "<td>" + item.Curso + "</td>" +
                            "<td>" + item.TituloCurso + "</td>" +
                            "<td>" + item.Data_Hora + "</td>" +
                            "<td class='formatcurrency'>" + item.Valor_Curso + "</td>" +
                            "<td><a href='setCursos.php?DescCurso="
                            + item.Curso + "&IDCurso=" + item.ID_Curso + "' target='' class='btn btn-primary' title='Inscrever-se'>" +
                            "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            "</a>" +
                            "</tr>"
                            );
        });
        $('.formatcurrency').formatCurrency();
    });

}

function ListaCursos(ID_EVT, DSC_Nome) {
    $('#myModal_Cursos').modal('show');
    $('#conteudoTabelaCursos').empty();
    $('.modal-title').empty();
    $('.modal-title').append("Cursos Disponíveis");

    $.getJSON("getCursos.php", {ID_EVT: ID_EVT}, function (data) {
        $.each(data, function (index, item) {
            $('#conteudoTabelaCursos')
                    .append(
                            "<tr>" +
                            "<td hidden=''>" + item.ID_Curso + "</td>" +
                            "<td>" + item.Curso + "</td>" +
                            "<td>" + item.TituloCurso + "</td>" +
                            "<td>" + item.Data_Hora + "</td>" +
                            "<td class='formatcurrency'>" + item.Valor_Curso + "</td>" +
                            "<td>"+
                            //<a href='setCursos.php?DescCurso="
                            //+ item.Curso + "&IDCurso=" + item.ID_Curso + "' class='btn btn-primary' title='Inscrever-se'>" +
                            //"<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            //"</a>" +
                            "<a href='ParticipanteInsert_Curso.php?ID_Curso="
                            + item.ID_Curso + "&ID_EVT=" +
                            item.ID_EVT + "' class='btn btn-warning' title='Clique para selecionar esta Categoria'>" +
                            "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            "</a>"+
                            "</tr>"
                            );
        });
        //$('.formatcurrency').formatCurrency();
    });

}

function ListaVincEventos(COD_Tipo_Forma_Pagamento) {
    $('#myEventos').modal('show');
    $('#conteudoEventos').empty();
    $('.modal-title').empty();
    $('.modal-title').append("Vincular ao Evento");

    $.getJSON("getVincEventos.php", {COD_Tipo_Forma_Pagamento: COD_Tipo_Forma_Pagamento}, function (data) {
        $.each(data, function (index, item) {
            $('#conteudoEventos')
                    .append(
                            "<tr>" +
                            "<td hidden=''>" + item.ID_EVT + "</td>" +
                            "<td>" + item.DSC_Nome + "</td>" +
                            "<td align='right'><a href='setVincEventos.php?ID_EVT="
                            + item.ID_EVT + "&CodFPgto=" + COD_Tipo_Forma_Pagamento + "' title='Vincular ao Evento'>" +
                            "<span class='btn btn-primary glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                            "</a></tr>"
                            );
        });
        //$('.formatcurrency').formatCurrency();
    });

}
