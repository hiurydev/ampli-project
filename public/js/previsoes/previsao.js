function onClickSearch() {
    var cep = $('#cep').val();

    if(!cep) return alert('Informe um CEP!');
    
    $('#loading').removeClass('d-none');
    $('#previsao_content').addClass('d-none');

    $.ajax({
        url: '/obter-cidade/' + cep.replace(/-/g, ''),
        type: 'GET',
        success: function (res) {
            if (res.Erros) {
                $('#loading').addClass('d-none');
                alert('Cidade não encontrada!');
                return;
            }

            $('#cidade').val(res.localidade);
            exibePrevisao(res.localidade);
        },
        error: function () {
            $('#loading').addClass('d-none');
            alert('Erro ao obter dados da cidade!');
        }
    });
}

function exibePrevisao(cidade) {
    $.ajax({
        url: '/obter-clima/' + cidade,
        type: 'GET',
        success: function (res) {
            var previsao = res.current,
                local = res.location;

            limpaDados();

            $('#previsao_content .card-header h5').text('Localidade: ' + local.name + ", " + local.region + ". " + local.country);

            $('#icone_tempo').html('<img src="' + previsao.weather_icons[0] + '" alt="Icone">');
            $('#previsao_content .card-body .col-md-11 h3').text(previsao.temperature + '°C');
            $('#previsao_content .card-body .col-md-11').append('<p>' + previsao.weather_descriptions[0] + '</p>');

            $('#previsao_content .card-body .row .col-md-4 .card-body:eq(0) .card-text').text(previsao.wind_speed + ' km/h');
            $('#previsao_content .card-body .row .col-md-4 .card-body:eq(1) .card-text').text(previsao.humidity + ' %');
            $('#previsao_content .card-body .row .col-md-4 .card-body:eq(2) .card-text').text(previsao.pressure + ' hPa');

            $('#previsao_content .card-body .row .col-md-4:eq(3) .card-body .card-text').text(previsao.cloudcover + ' %');
            $('#previsao_content .card-body .row .col-md-4:eq(4) .card-body .card-text').text(previsao.visibility + ' %');

            var data = moment(local.localtime).format('DD/MM/YYYY HH:mm');
            $('#previsao_content .card-body .row .col-md-4:eq(5) .card-body .card-text').text(data);

            $('#feelslike').append('<p> Sensação térmica de ' + previsao.feelslike + '°C </p>');

            $('#loading').addClass('d-none');
            $('#previsao_content').removeClass('d-none');
        }
    });
}

function limpaDados() {
    $('#previsao_content .card-header h5').text('');
    $('#icone_tempo').html('');
    $('#previsao_content .card-body .col-md-11 h3').text('');
    $('#previsao_content .card-body .col-md-11 p').remove();
    $('#previsao_content .card-body .row .col-md-4 .card-body .card-text').text('');
    $('#feelslike p').remove();
}

$("#cep").mask("00000-000");