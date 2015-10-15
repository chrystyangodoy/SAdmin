function ListaEventoCategoriaPopUp(ID_EVT_Evento, DSC_Nome) {

    $('#myModal').modal('show');
    $('#conteudoTabelaCategoria').empty();
    $('.modal-title').empty();
    $('.modal-title').append(DSC_Nome);
    

    $.getJSON("getEventoCategoriaPorEventoID.php", {ID_EVT_Evento: ID_EVT_Evento},function (data) {
                $.each(data, function (index, item) {                    
                    $('#conteudoTabelaCategoria')
                            .append(
                                    "<tr>" +
                                    "<td>" + item.DSC_Nome + "</td>" +
                                    "<td>" + item.VLR_Inscricao + "</td>" +
                                    "<td>" + item.DT_Inicio_Valor + "</td>" +
                                    "<td>" + item.DT_Fim_Valor + "</td>" +
                                    "<td>" + "<a href='InscricaoParticipante.php?ID_Evento_Categoria=" 
                                                                        + item.ID_Evento_Categoria + "&ID_EVT_Evento="+
                                                                        item.ID_EVT_Evento + "' class='btn btn-warning' title='Clique para selecionar esta Categoria'>"+
                                                                        "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" +
                                                                        "</a>"+
                                    "</tr>"
                                    );
                });
            });
            
}
