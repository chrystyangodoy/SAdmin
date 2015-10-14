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
                $("#DSC_Endereco").val("...")
                $("#DSC_Bairro").val("...")
                $("#DSC_Cidade").val("...")
                $("#uf").val("...")
                $("#ibge").val("...")

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
            COD_CPF: {required: true, cpfValidacao: true},
            NUM_CEP: {required: true},
            DSC_Cidade: {required: true},
            DSC_Bairro: {required: true},
            DSC_Endereco: {required: true},
            ID_BSC_Empresa: {validaComboBox: true},
            ID_BSC_Profissao: {validaComboBox: true}
        },
        messages: {
            DSC_Nome: {required: 'Preencha o campo nome'},
            DSC_Email: {required: 'Informe o seu email', email: 'Ops, informe um email válido'},
            COD_CPF: {required: 'Preencha o campo CPF'},
            NUM_CEP: {required: 'Preencha o campo CEP'},
            DSC_Cidade: {required: 'Preencha o campo Cidade'},
            DSC_Bairro: {required: 'Preencha o campo Bairro'},
            DSC_Endereco: {required: 'Preencha o campo Endereço'},
            ID_BSC_Empresa: {validaComboBox: 'Preencha o campo Empresa'},
            ID_BSC_Profissao: {validaComboBox: 'Preencha o campo Profissão'}

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

        if (CPFValido(cpf)){
            $.getJSON("getParticipantePorCPF.php", {COD_CPF: cpf}, function (data) {
                $("#loadImg").css("display", "block");

                $('#DSC_Nome').val("").attr("disabled", false);
                $('#DSC_Email').val("").attr("disabled", false);
                $('#COD_RG').val("").attr("disabled", false);
                $('#NUM_CEP').val("").attr("disabled", false);
                $('#DSC_Cidade').val("").attr("disabled", false);
                $('#DSC_Bairro').val("").attr("disabled", false);
                $('#DSC_Endereco').val("").attr("disabled", false);
                $('#NUM_Fone').val("").attr("disabled", false);
                $('#NUM_Celular').val("").attr("disabled", false);
                $('#NUM_FAX').val("").attr("disabled", false);
                $('#NUM_FAX_Promotora').val("").attr("disabled", false);
                $('#ID_BSC_Empresa').val("").attr("disabled", false);
                $('#ID_BSC_Profissao').val("").attr("disabled", false);
                $('#DSC_Presidente_Promotora').val("").attr("disabled", false);
                $('#DSC_Profissao_Especialidade').val("").attr("disabled", false);
                $('#NUM_Registro').val("").attr("disabled", false);
                $('#COD_Tipo_Estado').val("").attr("disabled", false);
                $('#COD_Tipo_Estado').val("").attr("disabled", false);
                $('.btn').attr("disabled", false);
                dataStr = data.toString();
                console.log(dataStr);
                
                if (!(dataStr == "[]") || !(dataStr == "") || !(dataStr.length == 0)) {
                    $('#DSC_Nome').val(data[0].DSC_Nome);
                    $('#DSC_Email').val(data[0].DSC_Email);
                    $('#COD_RG').val(data[0].COD_RG);
                    $('#NUM_CEP').val(data[0].NUM_CEP);
                    $('#DSC_Cidade').val(data[0].DSC_Cidade);
                    $('#DSC_Bairro').val(data[0].DSC_Bairro);
                    $('#DSC_Endereco').val(data[0].DSC_Endereco);
                    $('#NUM_Fone').val(data[0].NUM_Fone);
                    $('#NUM_Celular').val(data[0].NUM_Celular);
                    $('#NUM_FAX').val(data[0].NUM_FAX);
                    $('#NUM_FAX_Promotora').val(data[0].NUM_FAX_Promotora);
                    $('#ID_BSC_Empresa').val(data[0].ID_BSC_Empresa);
                    $('#ID_BSC_Profissao').val(data[0].ID_BSC_Profissao);
                    $('#DSC_Presidente_Promotora').val(data[0].DSC_Presidente_Promotora);
                    $('#DSC_Profissao_Especialidade').val(data[0].DSC_Profissao_Especialidade);
                    $('#NUM_Registro').val(data[0].NUM_Registro);
                    $('#COD_Tipo_Estado').val(data[0].COD_Tipo_Estado);

                }

                $("#loadImg").css("display", "none");
            });
        }
    });
});

