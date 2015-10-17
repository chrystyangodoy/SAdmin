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
            COD_CPF: {required: true, cpfValidacao: true, cpfValidacao:true},
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
        if (CPFValido(cpf)) {
            console.log("CPF Válido!");
            console.log("Inicio do getJson");
            $("#loadImg").css("display", "block").fadeIn();
            var CPFnaoCadastrado = isCPFCadastrado(cpf);
            if (CPFnaoCadastrado == 1) {
                $('#DSC_Nome').attr("disabled", false);
                $('#DSC_Email').attr("disabled", false);
                $('#COD_RG').attr("disabled", false);
                $('#NUM_CEP').attr("disabled", false);
                $('#DSC_Cidade').attr("disabled", false);
                $('#DSC_Bairro').attr("disabled", false);
                $('#DSC_Endereco').attr("disabled", false);
                $('#NUM_Fone').attr("disabled", false);
                $('#NUM_Celular').attr("disabled", false);
                $('#NUM_FAX').attr("disabled", false);
                $('#NUM_FAX_Promotora').attr("disabled", false);
                $('#ID_BSC_Empresa').attr("disabled", false);
                $('#ID_BSC_Profissao').attr("disabled", false);
                $('#DSC_Presidente_Promotora').attr("disabled", false);
                $('#DSC_Profissao_Especialidade').attr("disabled", false);
                $('#NUM_Registro').attr("disabled", false);
                $('#COD_Tipo_Estado').attr("disabled", false);
                $('#COD_Tipo_Estado').attr("disabled", false);
                $('.btn-primary').attr("disabled", false);
                $('#DSC_Nome').focus();
                console.log('campos habilitados');
            } else {
                $('#DSC_Nome').attr("disabled", true).val("");
                $('#DSC_Email').attr("disabled", true).val("");
                $('#COD_RG').attr("disabled", true).val("");
                $('#NUM_CEP').attr("disabled", true).val("");
                $('#DSC_Cidade').attr("disabled", true).val("");
                $('#DSC_Bairro').attr("disabled", true).val("");
                $('#DSC_Endereco').attr("disabled", true).val("");
                $('#NUM_Fone').attr("disabled", true).val("");
                $('#NUM_Celular').attr("disabled", true).val("");
                $('#NUM_FAX').attr("disabled", true).val("");
                $('#NUM_FAX_Promotora').attr("disabled", true).val("");
                $('#ID_BSC_Empresa').attr("disabled", true).val("");
                $('#ID_BSC_Profissao').attr("disabled", true).val("");
                $('#DSC_Presidente_Promotora').attr("disabled", true).val("");
                $('#DSC_Profissao_Especialidade').attr("disabled", true).val("");
                $('#NUM_Registro').attr("disabled", true).val("");
                $('#COD_Tipo_Estado').attr("disabled", true).val("");
                $('#COD_Tipo_Estado').attr("disabled", true).val("");
                $('.btn-primary').attr("disabled", true);
                console.log("CPF Já Cadastrado.");
                showAlert('error', 'CPF Já Cadastrado para este evento.');
                
            }
            $("#loadImg").css("display", "none").fadeOut();
        }
    });
});

