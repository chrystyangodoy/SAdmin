//Método de validação do comboBox
jQuery.validator.addMethod("validaComboBox", function (value, element) {
    if (value == 0)
        return this.optional(element) || false;
    return this.optional(element) || true;
}, "Selecione um Valor."
        );

$(document).ready(function () {
    $('#DT_Inicio_Valor').mask('99/99/9999');
    $('#DT_Fim_Valor').mask('99/99/9999');

    //Validações
    $('#Cadastrar').validate({
        rules: {
            DSC_Nome: {required: true},
            VLR_Inscricao: {required: true},
            DT_Inicio_Valor: {required: true},
            DT_Fim_Valor: {required: true},
            ID_EVT_Evento: {validaComboBox: true}
            
        },
        messages: {
            DSC_Nome: {required: 'Preencha o campo Categoria'},
            VLR_Inscricao: {required: 'Preencha o campo'},
            DT_Inicio_Valor:{required: 'Preencha o campo'},
            DT_Fim_Valor: {required: 'Preencha o campo'},
            ID_EVT_Evento: {validaComboBox: 'Preencha o campo'} 
        },
        submitHandler: function (form) {

            //var dados = $(form).serialize();

            $.ajax({
                type: "POST",
                url: "EventoCategoriaInsert.php",
                data: dados,
                success: function (data)
                {
                    if (data == 1) {
                        showAlert('success', 'Salvo.');
                    } else {
                        showAlert('error', 'falha ao salvar.');
                    }
                }
            });

            return false;
        }
    });
});

