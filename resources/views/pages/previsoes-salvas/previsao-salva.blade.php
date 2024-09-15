@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
   <h1 class="mt-4">Previsões salvas</h1>
   <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item active">Veja as informações salvas de suas previsões</li>
   </ol>
   <hr>

   <div id="loading" class="mt-2 d-none d-flex justify-content-center align-items-center" style="z-index: 1000;">
      <img src="{{ asset('images/loading.gif') }}" alt="Carregando..." style="width: 60px; height: 60px; filter: hue-rotate(350deg) saturate(40) brightness(100%);">
   </div>

   
</div>

<script src="{{ asset('js/previsoes-salvas/previsao-salva.js') }}" defer></script>
@endsection