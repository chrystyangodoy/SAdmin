$(document).ready(function () {
    $('#Login').validate({
        rules: {
            Username: {required: true},
            Password: {required: true}
        },
        messages: {
            Username: {required: 'Preencha o campo Login'},
            Password: {required: 'Preencha o campo Senha'}

        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "index.php",
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

