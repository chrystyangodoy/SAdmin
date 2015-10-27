//Método de validação do comboBox
jQuery.validator.addMethod("validaComboBox", function (value, element) {
    if (value == 0)
        return this.optional(element) || false;
    return this.optional(element) || true;
}, "Selecione um Valor."
        );
$(document).ready(function () {


$('#DT_Inicio').mask('99/99/9999');
$('#DT_Fim').mask('99/99/9999');
$('#COD_CNPJ_Promotora').mask('99.999.999/9999-99');
$('#COD_CNPJ_Promotora').mask('99.999.999/9999-99');

//Validações
    $('#Cadastrar').validate({
        rules: {
            DSC_Nome: {required: true},
            DT_Inicio: {required: true},
            DT_Fim: {required: true},
            DSC_Presidente: {required: true},
            COD_CNPJ_Promotora: {required: true},
            DSC_Nome_Promotora: {required: true},
            DSC_Presidente_Promotora: {required: true},
            DSC_Endereco_Promotora: {required: true},
            NUM_CEP_Promotora: {required: true},
            DSC_Cidade_Promotora: {required: true},
            NUM_Fone_Promotora: {required: true},
            NUM_FAX_Promotora: {required: true},
            DSC_EMAIL_Promotora: {required: true},
            QTD_CargaHorariaMinima: {required: true},
            ID_BSC_Local_Evento: {required: true, validaComboBox: true},
            COD_Tipo_Estado_promotora: {required: true, validaComboBox: true}
        },
        messages: {
            DSC_Nome: {required: 'Preencha o campo Evento'},
            DT_Inicio: {required: 'Preencha o campo Data Inicial'},
            DT_Fim: {required: 'Preencha o campo Data Final'},
            DSC_Presidente: {required: 'Preencha o campo Presidente Promotora'},
            COD_CNPJ_Promotora: {required: 'Preencha o campo Presidente Promotora'},
            DSC_Nome_Promotora: {required: 'Preencha o campo'},
            DSC_Presidente_Promotora: {required: 'Preencha o campo'},
            DSC_Endereco_Promotora: {required: 'Preencha o campo'},
            NUM_CEP_Promotora: {required: 'Preencha o campo'},
            DSC_Cidade_Promotora: {required: 'Preencha o campo'},
            NUM_Fone_Promotora: {required: 'Preencha o campo'},
            NUM_FAX_Promotora: {required: 'Preencha o campo'},
            DSC_EMAIL_Promotora: {required: 'Preencha o campo'},
            QTD_CargaHorariaMinima: {required: 'Preencha o campo'},
            ID_BSC_Local_Evento: {required: 'Preencha o campo', validaComboBox: 'Preencha o campo'},
            COD_Tipo_Estado_promotora: {required: 'Preencha o campo', validaComboBox: 'Preencha o campo'}
        },
        submitHandler: function (form) {

            //var dados = $(form).serialize();

            $.ajax({
                type: "POST",
                url: "EventoInsert.php",
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