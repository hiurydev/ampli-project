<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Weather System 2.0</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-gradient-blue">
    <div class="text-center p-4 bg-white shadow rounded welcome-box">
        <img src="https://www.amplimed.com.br/wp-content/uploads/2024/06/Marca-Amplimed-1200x675-1.png" alt="Logo" class="mb-4" style="max-width: 200px; max-height: 100px;">
        <h2 class="mb-3 font-weight-bold text-shadow mt-custom-minus-20">
            Weather System 2.0
        </h2>
        <p class="mb-4">
            Confira, compare as previsões e prepare-se para o clima!
        </p>
        <a href="{{ route('inicio') }}" class="btn btn-lg btn-purple-custom mt-4">
            Ir para o Sistema
        </a>
        <div class="social-icons mt-5 mb-0">
            <a href="https://www.linkedin.com" target="_blank" aria-label="LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
        </div>
    </div>
</body>
</html>
