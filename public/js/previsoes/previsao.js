var previsaoData = {};

function onClickPesquisar(cidade = null) {
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
            armazenaDados(previsao, local);

            $('#previsao_content .card-header h5').text('Localidade: ' + local.name + ", " + local.region + ". " + local.country);

            $('#icone_tempo').html('<img style="max-width: 63px; !important" src="' + previsao.weather_icons[0] + '" alt="Icone">');
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

function armazenaDados(previsao, local) {
    previsaoData = {
        nome: local.name,
        cidade: local.name,
        pais: local.country,
        regiao: local.region,
        temperatura: previsao.temperature,
        descricao_clima: previsao.weather_descriptions[0],
        icone_clima: previsao.weather_icons[0],
        velocidade_vento: previsao.wind_speed,
        umidade: previsao.humidity,
        pressao: previsao.pressure,
        condicao_clima: previsao.weather_code,
        dia: previsao.is_day ?? true ? 1 : 0,
        direcao_vento: previsao.wind_dir,
        sensacao_termica: previsao.feelslike,
        nebulosidade: previsao.cloudcover,
        visibilidade: previsao.visibility,
        data_horario_local: moment(local.localtime).format('YYYY-MM-DD')
    };
}

function onClickSave() {
    $.ajax({
        type: 'POST',
        url: '/previsoes',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            nome: previsaoData.nome,
            cidade: previsaoData.cidade,
            pais: previsaoData.pais,
            regiao: previsaoData.regiao,
            temperatura: previsaoData.temperatura,
            descricao_clima: previsaoData.descricao_clima,
            icone_clima: previsaoData.icone_clima,
            velocidade_vento: previsaoData.velocidade_vento,
            umidade: previsaoData.umidade,
            pressao: previsaoData.pressao,
            condicao_clima: previsaoData.condicao_clima,
            dia: previsaoData.dia,
            direcao_vento: previsaoData.direcao_vento,
            sensacao_termica: previsaoData.sensacao_termica,
            nebulosidade: previsaoData.nebulosidade,
            visibilidade: previsaoData.visibilidade,
            data_horario_local: previsaoData.data_horario_local
        },
        success:function(res){
            alert('Dados salvos com sucesso!');
        }
    });
}

function onClickHistoricoBuscas() {
    var $historicoContent = $('#historico_content');

    if ($historicoContent.hasClass('d-none')) {
        $historicoContent.removeClass('d-none');
        carregarHistorico();
    } else {
        $historicoContent.addClass('d-none');
    }
}

function carregarHistorico() {
    $.ajax({
        url: '/historicos/pesquisas',
        type: 'GET',
        success: function(res) {
            var historicoLista = $('#historico_lista');
            historicoLista.empty();

            if (res.length > 0) {
                res.forEach(function(cidade) {
                    historicoLista.append('<li style="cursor: pointer;" class="list-group-item">' + cidade + '</li>');
                });

                $('#historico_lista li').on('click', function() {
                    consultarPeloHistorico( $(this).text());
                });
            } else {
                historicoLista.append('<li class="list-group-item">Nenhuma cidade encontrada</li>');
            }
        }
    });
}

function onClickLimparHistorico() {
    $.ajax({
        url: '/historicos/remover',
        type: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function() {
            $('#historico_lista').empty().append('<li class="list-group-item">Nenhuma cidade encontrada</li>');
        }
    });
}

function consultarPeloHistorico(cidade) {
    var $historicoContent = $('#historico_content');

    onClickPesquisar(cidade);

    $historicoContent.addClass('d-none');
}

$("#cep").mask("00000-000");