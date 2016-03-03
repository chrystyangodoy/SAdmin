jQuery.validator.addMethod("cpfValidacao", function (value, element) {
    value = jQuery.trim(value);

    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');
    while (cpf.length < 11)
        cpf = "0" + cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9)
            b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) {
        a[9] = 0
    } else {
        a[9] = 11 - x
    }
    b = 0;
    c = 11;
    for (y = 0; y < 10; y++)
        b += (a[y] * c--);
    if ((x = b % 11) < 2) {
        a[10] = 0;
    } else {
        a[10] = 11 - x;
    }
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg))
        return this.optional(element) || false;
    return this.optional(element) || true;
}, "Informe um CPF válido."); // Mensagem padrão 

jQuery.validator.addMethod("cpfCadastradoEdit", function (value, element) {
    value = jQuery.trim(value);

    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');
    idParticipante = $("#ID_Participante").val();
    resultado = isCPFCadastradoEdit(cpf, idParticipante);
    return this.optional(element) || resultado == 1;

    //Retorna 1 caso não tenha cadastro
    //Retorna 0 caso já haja cadastro
}, "CPF já cadastrado");

jQuery.validator.addMethod("validaComboBox", function (value, element) {
    if (value == 0)
        return this.optional(element) || false;
    return this.optional(element) || true;
}, "Selecione um Valor."
        );

$(document).ready(function () {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#DSC_Endereco").val("");
        $("#DSC_Bairro").val("");
        $("#DSC_Cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }

    //Quando o campo cep perde o foco.
    $("#NUM_CEP").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /[0-9]{8}/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#DSC_Endereco").val("...");
                $("#DSC_Bairro").val("...");
                $("#DSC_Cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#DSC_Endereco").val(dados.logradouro);
                        $("#DSC_Bairro").val(dados.bairro);
                        $("#DSC_Cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        showAlert('error', 'CEP não encontrado.');
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                showAlert('error', 'Formato de CEP inválido.');
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    $('#COD_CPF').mask('000.000.000-00');
    $('#NUM_Celular').mask('(00) 00000-0000');
    $('#NUM_Fone').mask('(00) 0000-0000');
    $('#NUM_FAX').mask('(00) 0000-0000');
    $('#NUM_FAX_Promotora').mask('(00) 0000-0000');
    $('#NUM_CEP').mask('00.000-000');
    /*
     $('#Cadastrar').tooltipster({
     trigger: 'custom', // default is 'hover' which is no good here
     onlyOne: false, // allow multiple tips to be open at a time
     position: 'right'  // display the tips to the right of the element
     });
     */

    $('#Cadastrar').validate({
        rules: {
            DSC_Nome: {required: true},
            DSC_Email: {required: true, email: true},
            COD_CPF: {required: true, cpfValidacao: true, cpfCadastradoEdit: true},
            NUM_CEP: {required: true},
            DSC_Cidade: {required: true},
            DSC_Bairro: {required: true},
            DSC_Endereco: {required: true},
//            ID_BSC_Empresa: {validaComboBox: true},
//            ID_BSC_Profissao: {validaComboBox: true}
        },
        messages: {
            DSC_Nome: {required: 'Preencha o campo nome'},
            DSC_Email: {required: 'Informe o seu email', email: 'Ops, informe um email válido'},
            COD_CPF: {required: 'Preencha o campo CPF'},
            NUM_CEP: {required: 'Preencha o campo CEP'},
            DSC_Cidade: {required: 'Preencha o campo Cidade'},
            DSC_Bairro: {required: 'Preencha o campo Bairro'},
            DSC_Endereco: {required: 'Preencha o campo Endereço'},
//            ID_BSC_Empresa: {validaComboBox: 'Preencha o campo Empresa'},
//            ID_BSC_Profissao: {validaComboBox: 'Preencha o campo Profissão'}

        },
        /*     errorPlacement: function (error, element) {
         $(element).tooltipster('update', $(error).text());
         $(element).tooltipster('show');
         },
         success: function (label, element) {
         $(element).tooltipster('hide');
         },*/
        submitHandler: function (form) {

            //var dados = $(form).serialize();

            $.ajax({
                type: "POST",
                url: "ParticipanteInsert.php",
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

    $("#COD_CPF").blur(function () {
        cpf = $("#COD_CPF").val();
        idParticipante = $("#ID_Participante").val();
        get = isCPFCadastradoEdit()(cpf, idParticipante);

        if (get == 0) {
            showAlert('error', 'CPF já Cadastrado');
        }

    });
});

