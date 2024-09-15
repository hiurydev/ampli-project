
@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
   <h1 class="mt-4">Consultar previsão</h1>
   <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item active">Veja as informações do clima personalizadas para você</li>
   </ol>
   <hr>

   <div class="row">
      <div class="col-md-4">
         <label for="cep" class="form-label">CEP</label>
         <input type="text" class="form-control mb-2" id="cep" placeholder="Informe o CEP">
      </div>
      <div class="col-md-7">
         <label for="cidade" class="form-label">Cidade</label>
         <input type="text" class="form-control mb-2" id="cidade" placeholder="Informe a cidade">
      </div>
      <div class="col-md-1 d-flex align-items-end mb-custom-12">
         <div class="d-flex gap-2">
            <button onClick="onClickSearch()" class="btn btn-outline-dark btn-sm" type="button" id="button-search">
               <i class="fas fa-search"></i> 
            </button>
         </div>
      </div>
   </div>
   
   <div id="loading" class="mt-2 d-none d-flex justify-content-center align-items-center" style="z-index: 1000;">
      <img src="{{ asset('images/loading.gif') }}" alt="Carregando..." style="width: 60px; height: 60px; filter: hue-rotate(350deg) saturate(40) brightness(100%);">
   </div>

   <div class="card bg-light mb-3 mt-4 d-none" id="previsao_content">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h5></h5>
         <button onClick="onClickSearch()" class="btn btn-outline-secondary btn-sm" id="reset-button">
               <i class="fas fa-sync-alt"></i> 
         </button>
      </div>
      <div class="card-body">
         <div class="row mb-2">
            <div class="col-md-1" id="icone_tempo">
            </div>
            <div class="col-md-11">
               <h3>
               </h3>
            </div>
         </div>
         <div class="row mb-2">
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title"><i class="fa-solid fa-wind"></i> Vento</h5>
                           <p class="card-text"></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title"><i class="fa-solid fa-droplet"></i> Umidade</h5>
                           <p class="card-text"></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title"><i class="fa-solid fa-temperature-arrow-down"></i> Pressão</h5>
                           <p class="card-text"></p>
                     </div>
                  </div>
               </div>
         </div>
         <div class="row mb-2">
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title"><i class="fa-brands fa-cloudflare"></i> Nebulosidade</h5>
                           <p class="card-text"></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title"><i class="fa-solid fa-eye"></i> Visibilidade</h5>
                           <p class="card-text"></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title"><i class="fa-solid fa-clock"></i> Horário local</h5>
                           <p class="card-text"></p>
                     </div>
                  </div>
               </div>
         </div>
         <div id="feelslike">
            
         </div>
      </div>
   </div>

</div>

<script src="{{ asset('js/previsoes/previsao.js') }}" defer></script>
@endsection