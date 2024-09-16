$(document).ready(function() {
    $('.btn-remover').on('click', function() {
        const id = $(this).data('id');

        if (confirm('Tem certeza que deseja remover esta previsão?')) {
            $('#loading').removeClass('d-none');

            $.ajax({
                url: '/previsoes/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    if (response.success) {
                        $('#previsao-' + id).remove();
                        Messenger().post({
                            message: 'Previsão removida com sucesso!',
                            type: 'success',
                        });
                    } else {
                        Messenger().post({
                            message: 'Erro ao remover previsão.',
                            type: 'error',
                        });
                    }
                },
                error: function() {
                    Messenger().post({
                        message: 'Erro ao remover previsão.',
                        type: 'error',
                    });
                },
                complete: function() {
                    $('#loading').addClass('d-none');
                }
            });
        }
    });

    $('.btn-visualizar').on('click', function () {
        const id = $(this).data('id');
        
        $.ajax({
            url: '/previsoes/' + id,
            method: 'GET',
            success: function (data) {
                $('#cidade').text(data.cidade);
                $('#temperatura').text(data.temperatura + '°C');
                $('#vento').text(data.velocidade_vento + ' km/h');
                $('#umidade').text(data.umidade + '%');
                $('#pressao').text(data.pressao + ' hPa');
                $('#nebulosidade').text(data.nebulosidade + '%');
                $('#visibilidade').text(data.visibilidade + ' km');
                $('#horario_local').text(moment(data.data_horario_local).format('DD/MM/YYYY HH:mm'));
                $('#feelslike_modal').text('Sensação térmica: ' + data.sensacao_termica + '°C');
                
                $('#modal-previsao').modal('show');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});
