function onClickCompare() {
    var cep1 = $('#cep1').val(),
        cep2 = $('#cep2').val();

    if(!cep1 || !cep2) return alert('Informe ambos os CEPs!');
    
    $('#loading').removeClass('d-none');
    $('#previsao_content').addClass('d-none');

    $.ajax({
        url: '/obter-cidade-comparar/' + cep1.replace(/-/g, '') + '/' + cep2.replace(/-/g, ''),
        type: 'GET',
        success: function (res) {
            if (!res.Cidade1 || !res.Cidade2) {
                $('#loading').addClass('d-none');
                alert('Uma ou ambas as cidades não foram encontradas!');
                return;
            }

            $('#cidade1').val(res.Cidade1);
            $('#cidade2').val(res.Cidade2);
            exibePrevisao();
        },
        error: function () {
            $('#loading').addClass('d-none');
            alert('Erro ao obter dados da cidade!');
        }
    });
}

function exibePrevisao() {
    var cidade1 = $('#cidade1').val(),
        cidade2 = $('#cidade2').val();
    
    $.ajax({
        url: '/previsoes/comparar/' + cidade1 + '/' + cidade2,
        type: 'GET',
        beforeSend: function() {
            $('#loading').removeClass('d-none');
            $('#comparison-section').addClass('d-none');
        },
        success: function (res) {
            var previsaoCidade1 = res.DataCidade1.current,
                localCidade1 = res.DataCidade1.location;
            var previsaoCidade2 = res.DataCidade2.current,
                localCidade2 = res.DataCidade2.location;

            // Atualize os dados da Cidade 1
            $('#cidade1-name').text(localCidade1.name);
            $('#cidade1-temp').text(previsaoCidade1.temperature + '°C');
            $('#cidade1-humidity').text(previsaoCidade1.humidity + '%');
            $('#cidade1-wind').text(previsaoCidade1.wind_speed + ' km/h');
            $('#cidade1-visibility').text(previsaoCidade1.visibility + ' km');
            $('#cidade1-pressure').text(previsaoCidade1.pressure + ' hPa');

            // Atualize os dados da Cidade 2
            $('#cidade2-name').text(localCidade2.name);
            $('#cidade2-temp').text(previsaoCidade2.temperature + '°C');
            $('#cidade2-humidity').text(previsaoCidade2.humidity + '%');
            $('#cidade2-wind').text(previsaoCidade2.wind_speed + ' km/h');
            $('#cidade2-visibility').text(previsaoCidade2.visibility + ' km');
            $('#cidade2-pressure').text(previsaoCidade2.pressure + ' hPa');

            // Exiba a seção de comparação e esconda o loading
            $('#loading').addClass('d-none');
            $('#comparison-section').removeClass('d-none');
        },
        error: function () {
            $('#loading').addClass('d-none');
            alert('Erro ao obter dados das cidades!');
        }
    });
}

function limpaDados() {
    $('#cidade1-name').text('');
    $('#cidade1-temp').text('');
    $('#cidade1-humidity').text('');
    $('#cidade1-wind').text('');
    $('#cidade1-visibility').text('');
    $('#cidade1-pressure').text('');

    $('#cidade2-name').text('');
    $('#cidade2-temp').text('');
    $('#cidade2-humidity').text('');
    $('#cidade2-wind').text('');
    $('#cidade2-visibility').text('');
    $('#cidade2-pressure').text('');
}

$("#cep1").mask("00000-000");
$("#cep2").mask("00000-000");