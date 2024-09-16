@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Previsões Salvas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Veja as informações salvas de suas previsões</li>
    </ol>
    <hr>

    <div id="loading" class="mt-2 d-none d-flex justify-content-center align-items-center" style="z-index: 1000;">
        <img src="{{ asset('images/loading.gif') }}" alt="Carregando..." style="width: 60px; height: 60px; filter: hue-rotate(350deg) saturate(40) brightness(100%);">
    </div>

    <div class="card bg-light mb-3 mt-4">
        <div class="card-header">
            <h5>Lista de Previsões Salvas</h5>
        </div>
        <div class="card-body">
            <table id="previsoes-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="10%">Código</th>
                        <th width="43%">Cidade</th>
                        <th width="20%">Temperatura</th>
                        <th width="15%">Data</th>
                        <th class="text-center" width="12%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($previsoes as $previsao)
                        <tr id="previsao-{{ $previsao->id }}">
                            <td class="text-center">{{ $previsao->id }}</td> 
                            <td>{{ $previsao->cidade }}</td>
                            <td>{{ $previsao->temperatura }}°C</td>
                            <td>{{ \Carbon\Carbon::parse($previsao->data_horario_local)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <button class="btn btn-outline-dark btn-sm btn-visualizar" data-id="{{ $previsao->id }}" type="button">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-dark btn-sm btn-remover" data-id="{{ $previsao->id }}" type="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal visualização-->
<div class="modal fade" id="modal-previsao" tabindex="-1" aria-labelledby="modal-previsao-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visualizar Previsão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card bg-light mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 id="cidade"></h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <h3 id="temperatura"></h3>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fa-solid fa-wind"></i> Vento</h5>
                                        <p class="card-text" id="vento"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fa-solid fa-droplet"></i> Umidade</h5>
                                        <p class="card-text" id="umidade"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fa-solid fa-temperature-arrow-down"></i> Pressão</h5>
                                        <p class="card-text" id="pressao"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fa-brands fa-cloudflare"></i> Nebulosidade</h5>
                                        <p class="card-text" id="nebulosidade"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fa-solid fa-eye"></i> Visibilidade</h5>
                                        <p class="card-text" id="visibilidade"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fa-solid fa-clock"></i> Horário local</h5>
                                        <p class="card-text" id="horario_local"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="feelslike_modal"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/previsoes-salvas/previsao-salva.js') }}" defer></script>

@endsection
