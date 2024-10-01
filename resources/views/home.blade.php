<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" id="app">
        <!-- Conteúdo da tela Home -->
        <h1>Bem-vindo à Home</h1>
        <p>Esta é a tela inicial de nosso sistema de gerenciamento de usuários.</p>
        <p>Prova App - Fabiano Carloto.</p>

        <!-- Botão para ir para a página de listagem de usuários -->
        <button class="btn btn-primary" @click="goToUsers">LOGIN</button>
    </div>

    <!-- Script para carregar o Vue -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>