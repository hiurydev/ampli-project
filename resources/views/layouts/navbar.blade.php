<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- Logo ajustada -->
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/logo_ampli.png') }}" alt="Logo" style="max-width: 60px; margin-left: 100px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <!-- Links centralizados -->
      <div class="navbar-nav mx-auto">
        <a class="nav-link active fs-5" aria-current="page" href="#">Início</a>
        <a class="nav-link fs-5" href="#">Comparar previsões</a>
        <a class="nav-link fs-5" href="#">Histórico</a>
      </div>

      <!-- Ícone de Sair no canto direito -->
      <a href="#" class="nav-link fs-5 color-purple-custom mr-custom-100px">
        <i class="fas fa-sign-out-alt color-purple-custom"></i> Sair
      </a>
    </div>
  </div>
</nav>
