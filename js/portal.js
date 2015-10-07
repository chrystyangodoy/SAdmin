function ListaEventoCategoriaPopUp(ID_EVT_Evento) {

    $('#myModal').modal('show');
    $('#conteudoTabelaCategoria').empty();


    $.getJSON("getEventoCategoriaPorEventoID.php", {ID_EVT_Evento: ID_EVT_Evento},function (data) {
                var tabledata = "";
                console.log(data);
                console.log(data[0].DSC_Nome);
                $.each(data, function (index, item) {
                    console.log(item.DSC_Nome);
                    console.log(item.VLR_Inscricao);
                    
                    $('#conteudoTabelaCategoria')
                            .append(
                                    "<tr>" +
                                    "<td>" + item.DSC_Nome + "</td>" +
                                    "<td>" + item.VLR_Inscricao + "</td>" +
                                    "<td>" + item.DT_Inicio_Valor + "</td>" +
                                    "<td>" + item.DT_Fim_Valor + "</td>" +
                                    "</tr>"
                                    );
                });
            });
            
}
