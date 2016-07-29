//Método de validação do comboBox
jQuery.validator.addMethod("validaComboBox", function (value, element) {
    if (value == 0)
        return this.optional(element) || false;
    return this.optional(element) || true;
}, "Selecione um Valor."
        );
$(document).ready(function () {
$('#Data_Hora').mask('99/99/9999');
$('#Data_Inicio').mask('99/99/9999');
$('#Data_Fim').mask('99/99/9999');

//Validações
    $('#Cadastrar').validate({
        rules: {
            Data_Hora: {required: true},
            Data_Inicio: {required: true},
            Data_Fim: {required: true},
        },
        messages: {
            Data_Hora: {required: 'Preencha o campo Data'},
            Data_Inicio: {required: 'Preencha o campo Data Inicial'},
            Data_Fim: {required: 'Preencha o campo Data Final'}
        }
    });
    
    $('#Salvar').validate({
        rules: {
            Data_Hora: {required: true},
            Data_Inicio: {required: true},
            Data_Fim: {required: true},
        },
        messages: {
            Data_Hora: {required: 'Preencha o campo Data'},
            Data_Inicio: {required: 'Preencha o campo Data Inicial'},
            Data_Fim: {required: 'Preencha o campo Data Final'}
        }
    });
});