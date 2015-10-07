function ListaEventoCategoriaPopUp(ID_EVT_Evento) {

    $('#myModal').modal('show');
    $('#conteudoTabelaCategoria').empty();


    $.getJSON("getEventoCategoriaPorEventoID.php", {ID_EVT_Evento: ID_EVT_Evento})
            .done(function (data) {
                var tabledata = "";
                console.log(data);
//                for (i = 0; i < data.length; i++) {
//                    
//                    tabledata = "";
//                    tabledata = "<tr>" +
//                                    "<td>" + data[i].DSC_Nome + "</td>" +
//                                    "<td>" + data[i].VLR_Inscricao + "</td>" +
//                                    "<td>" + data[i].DT_Inicio_Valor + "</td>" +
//                                    "<td>" + data[i].DT_Fim_Valor + "</td>" +
//                                "</tr>";
//                    $('#conteudoTabelaCategoria').append(tabledata);
//                    console.log(tabledata);
//                }
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
            })
            .fail(function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
                alert('error', 'Ocorreu um erro durante a exercução da ação.\n\
Desculpe o transtorno!');
            });
}
