@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Comparar previsões</h1>
    <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item active">Compare previsões do tempo e escolha a melhor para o seu planejamento</li>
    </ol>
    <hr>

   <!-- Formulário de Pesquisa -->
   <div class="row">
      <div class="col-md-4">
         <label for="cep1" class="form-label">CEP 1</label>
         <input type="text" class="form-control mb-2" id="cep1" placeholder="Informe o CEP">
         <label for="cep2" class="form-label">CEP 2</label>
         <input type="text" class="form-control mb-2" id="cep2" placeholder="Informe o CEP">
        
      </div>
      <div class="col-md-6">
        <label for="cidade1" class="form-label">Cidade 1</label>
        <input type="text" class="form-control mb-2" id="cidade1" placeholder="Informe a cidade" disabled>
        <label for="cidade2" class="form-label">Cidade 2</label>
        <input type="text" class="form-control mb-2" id="cidade2" placeholder="Informe a cidade" disabled>
      </div>
      <div class="col-md-2 d-flex align-items-end mb-custom-12">
         <div class="d-flex gap-2">
            <button onClick="onClickCompare()" class="btn btn-outline-dark btn-sm" type="button" id="button-search">
               <i class="fas fa-search"></i> Comparar
            </button>
         </div>
      </div>
   </div>

   <div id="loading" class="mt-2 d-none d-flex justify-content-center align-items-center" style="z-index: 1000;">
      <img src="{{ asset('images/loading.gif') }}" alt="Carregando..." style="width: 60px; height: 60px; filter: hue-rotate(350deg) saturate(40) brightness(100%);">
   </div>

   <div id="comparison-section" class="mt-4 d-none">
      <div class="row">
         <div class="col-md-6">
            <h4 id="cidade1-title">Cidade 1</h4>
            <div class="card bg-light mb-3">
               <div class="card-header">
                  <h5 id="cidade1-name">Nome da Cidade 1</h5>
               </div>
               <div class="card-body">
                  <div class="row mb-2">
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-temperature-three-quarters"></i> Temp.</h6>
                              <p class="card-text" id="cidade1-temp"></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-droplet"></i>Umidade</h6>
                              <p class="card-text" id="cidade1-humidity"></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-wind"></i> Vento</h6>
                              <p class="card-text" id="cidade1-wind"></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-eye"></i> Visibilidade</h6>
                              <p class="card-text" id="cidade1-visibility"></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-temperature-arrow-down"></i> Pressão</h6>
                              <p class="card-text" id="cidade1-pressure"></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-6">
            <h4 id="cidade2-title">Cidade 2</h4>
            <div class="card bg-light mb-3">
               <div class="card-header">
                  <h5 id="cidade2-name">Nome da Cidade 2</h5>
               </div>
               <div class="card-body">
                  <div class="row mb-2">
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-temperature-three-quarters"></i> Temp.</h6>
                              <p class="card-text" id="cidade2-temp"></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-droplet"></i>Umidade</h6>
                              <p class="card-text" id="cidade2-humidity"></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-wind"></i> Vento</h6>
                              <p class="card-text" id="cidade2-wind"></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-2">
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-eye"></i> Visibilidade</h6>
                              <p class="card-text" id="cidade2-visibility"></p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <h6 class="card-title"><i class="fa-solid fa-temperature-arrow-down"></i> Pressão</h6>
                              <p class="card-text" id="cidade2-pressure"></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="{{ asset('js/previsoes-comparacao/previsao-comparacao.js') }}" defer></script>
@endsection
