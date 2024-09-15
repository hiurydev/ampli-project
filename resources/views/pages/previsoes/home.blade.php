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
         <input type="text" disabled class="form-control mb-2 disabled readonly" id="cidade" placeholder="">
      </div>
      <div class="col-md-1 d-flex align-items-end mb-custom-12">
         <div class="d-flex gap-2">
            <button class="btn btn-outline-dark btn-sm" type="button" id="button-search">
               <i class="fas fa-search"></i> 
            </button>
         </div>
      </div>
   </div>
   
   <div class="card bg-light mb-3 mt-4">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h5>Localidade: ${data.name}</h5>
         <button class="btn btn-outline-secondary btn-sm" id="reset-button">
               <i class="fas fa-sync-alt"></i> 
         </button>
      </div>
      <div class="card-body">
         <div class="row mb-2">
            <div class="col-md-2">
               <div class="card">
                  <div class="card-body">
                     Icone dia ou noite
                  </div>
               </div>
            </div>
            <div class="col-md-10 mt-custom-15">
               <h3>
                  23°C
               </h3>
               Tempo ensolarado
            </div>
         </div>
         <div class="row">
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title">Vento</h5>
                           <p class="card-text">${data.main.temp} °C</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title">Umidade</h5>
                           <p class="card-text">${data.wind.speed} m/s</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                           <h5 class="card-title">Pressão</h5>
                           <p class="card-text">${data.main.feels_like} °C</p>
                     </div>
                  </div>
               </div>
         </div>
      </div>
   </div>

</div>

@endsection