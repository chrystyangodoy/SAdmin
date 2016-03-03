
function desabilitaCampos() {
    $('#DSC_Nome').attr("disabled", true).val("");
    $('#Nome_Cracha').attr("disabled", true).val("");
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
}

function habilitaCampos() {
    $('#DSC_Nome').attr("disabled", false);
    $('#Nome_Cracha').attr("disabled", false);
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
}

$(document).ready(function () {

    function limpa_formulario_cep() {
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
                $("#loadImg").css("display", "block").fadeIn();
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
                        limpa_formulario_cep();
                        showAlert('error', 'CEP não encontrado.');
                    }
                    $("#loadImg").css("display", "none").fadeOut();
                });
            } //end if.
            else {
//cep é inválido.
                limpa_formulario_cep();
                showAlert('error', 'Formato de CEP inválido.');
            }
        } //end if.
        else {
//cep sem valor, limpa formulário.
            limpa_formulario_cep();
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
            COD_CPF: {required: true, cpfValidacao: true, cpfCadastradoEvento: true},
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

    $("#COD_CPF").on('keypress blur', function () {
        var CPFinfo = $("#COD_CPF").val();
        if (CPFinfo != "" || CPFinfo != 0) {
            desabilitaId_Estrangeiro();
        } else {
            habilitaId_Estrangeiro();
        }

        cpf = $("#COD_CPF").val();
        cpf = jQuery.trim(cpf);

        cpf = cpf.replace('.', '');
        cpf = cpf.replace('.', '');
        cpf = cpf.replace('-', '');
        console.log('keypress');
        if (CPFValido(cpf)) {
            console.log("CPF Válido!");
            console.log("Inicio do getJson");
            $("#loadImg").css("display", "block").fadeIn();
            var CPFNaoCadastradoEvento = isCPFCadatradoEvento(cpf, getUrlParameter('ID_EVT_Evento'));
            console.log(CPFNaoCadastradoEvento);
            if (CPFNaoCadastradoEvento == 1) {

                var CPFnaoCadastrado = isCPFCadastrado(cpf);
                if (CPFnaoCadastrado == 1) {
                    habilitaCampos();
                   //$('#DSC_Nome').focus();
                    console.log('campos habilitados');
                } else {
                    desabilitaCampos();
                    console.log("CPF Já Cadastrado.");
                    showAlert('error', 'Você já possui cadastro no sistema.');
                    $('#modalLogin').modal('show');
                    cpf = jQuery.trim(cpf);

                    cpf = cpf.replace('.', '');
                    cpf = cpf.replace('.', '');
                    cpf = cpf.replace('-', '');

                    $('#Username').val(cpf);
                    $('#Password').focus();
                }
            } else {
                showAlert('error', 'CPF já cadastrado para este Evento');
            }
            $("#loadImg").css("display", "none").fadeOut();
        }
    });

    $("#Id_Estrangeiro").on('keypress blur', function () {
        var IdEstinfo = $("#Id_Estrangeiro").val();
            if (IdEstinfo != "" || IdEstinfo != 0) {
                desabilitaCPF();
            } else {
                habilitaCPF();
            }
            Id_Estrangeiro = $("#Id_Estrangeiro").val();
            desabilitaCPF();
            console.log('keypress');
//        if (Id_EstrangeiroValido(Id_Estrangeiro)) {
//          console.log("ID Estrangeiro Válido!");
            console.log("Inicio do getJson. Imagem!");
            $("#loadImg").css("display", "block").fadeIn();
            var Id_EstrangeiroNaoCadastradoEvento = isId_EstrangeiroCadatradoEvento(Id_Estrangeiro, getUrlParameter('ID_EVT_Evento'));
            console.log("Não cadastrardo: " + Id_EstrangeiroNaoCadastradoEvento);
            if (Id_EstrangeiroNaoCadastradoEvento == 1) {
                var Id_EstrangeironaoCadastrado = isId_EstrangeiroCadastrado(Id_Estrangeiro);
                console.log("Id_Estrangeiro cadastrardo: " + Id_EstrangeironaoCadastrado);
                if (Id_EstrangeironaoCadastrado == 1) {
                    habilitaCampos();
                  // $('#DSC_Nome').focus();
                    console.log('campos habilitados');
                }
                else {
                    desabilitaCampos();
                    console.log("ID Estrangeiro Já Cadastrado.");
                    showAlert('error', 'Você já possui cadastro no sistema.');
                    $('#modalLogin').modal('show');
                    $('#Username').val(cpf);
                    $('#Password').focus();
                }
            } else {
                showAlert('error', 'ID Estrangeiro já cadastrado para este Evento');
            }
            $("#loadImg").css("display", "none").fadeOut();
    });

    function desabilitaCPF() {
        $('#COD_CPF').attr("disabled", true).val("");
        $('#COD_CPF').attr("required",false).val("");
        $('#COD_CPF').attr("cpfValidacao",false).val("");
        $('#COD_CPF').attr("cpfCadastradoEvento",false).val("");
        //COD_CPF: {required: true, cpfValidacao: true, cpfCadastradoEvento: true},
    }
    function habilitaCPF() {
        $('#COD_CPF').attr("disabled", false).val("");
        $('#COD_CPF').attr("required",true).val("");
        $('#COD_CPF').attr("cpfValidacao",true).val("");
        $('#COD_CPF').attr("cpfCadastradoEvento",true).val("");
    }

    function desabilitaId_Estrangeiro() {
        $('#Id_Estrangeiro').attr("disabled", true).val("");
    }
    function habilitaId_Estrangeiro() {
        $('#Id_Estrangeiro').attr("disabled", false);
    }

    $('#btnLogin').click(function () {
        $("#loadImg").css("display", "block").fadeIn();
        username = $('#Username').val();
        password = $('#Password').val();
        console.log('Click no login');

        $.getJSON("getLoginParticipante.php", {Username: username, Password: password}, function (data) {

            console.log('Inicio get');

            $("#loadImg").css("display", "none").fadeOut();

            isSenhaCorreta = false;

            $.each(data, function (index, item) {

                console.log('each');

                $('#DSC_Nome').val(item.DSC_Nome);
                $('#Nome_Cracha').val(item.Nome_Cracha);
                $('#DSC_Email').val(item.DSC_Email);
                $('#COD_RG').val(item.COD_RG);
                $('#COD_CPF').val(item.COD_CPF);
                $('#Id_Estrangeiro').val(item.Id_Estrangeiro);
                $('#DSC_Endereco').val(item.DSC_Endereco);
                $('#DSC_Bairro').val(item.DSC_Bairro);
                $('#DSC_Cidade').val(item.DSC_Cidade);
                $('#NUM_CEP').val(item.NUM_CEP);
                $('#NUM_Fone').val(item.NUM_Fone);
                $('#NUM_Celular').val(item.NUM_Celular);
                $('#NUM_FAX').val(item.NUM_FAX);
                $('#DSC_Profissao_Especialidade').val(item.DSC_Profissao_Especialidade);
                $('#NUM_Registro').val(item.NUM_Registro);
                $('#COD_Tipo_Estado').val(item.COD_Tipo_Estado);
                $('#ID_BSC_Empresa').val(item.ID_BSC_Empresa);
                $('#ID_BSC_Profissao').val(item.ID_BSC_Profissao);
                $('#ID_Participante').val(item.ID_Participante);
                $('#ID_Usuario').val(item.ID_Usuario);

                setCookie('ID_Participante', item.ID_Participante, 1);
                setCookie('ID_Usuario', item.ID_Usuario, 1);

                isSenhaCorreta = true;

            });

            if (isSenhaCorreta) {

                habilitaCampos();
                $('#modalLogin').modal('hide');
                //$('#COD_CPF').attr("disabled", true);
                showAlert('', 'Confirme seus dados');
            } else {

                showAlert('error', 'Usuário ou senha incorreto');
            }

            $("#loadImg").css("display", "none").fadeOut();
            $('#Username').val('');
            $('#Password').val('');
        });

    });

});

