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

jQuery.validator.addMethod("cpfCadastrado", function (value, element) {
    value = jQuery.trim(value);

    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');

    resultado = isCPFCadastrado(cpf);



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