$(document).ready(function () {
    $("#busca").keyup(function () {
        var busca = $(this).val();

        if (busca != "") {
            $.ajax({
                url: $('form').attr('data-url-busca'),
                method: 'POST',
                data: {
                    busca: busca
                },
                success: function (data) {
                    $('#buscaResultado').removeClass('d-none').html(data);
                }
            });
        } else {
            $('#buscaResultado').addClass('d-none').empty();
        }
    });
});
