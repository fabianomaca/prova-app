<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Novo Grupo</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <!-- Componente Vue para o formulário de cadastro -->
        <newgroup-form>
        </newgroup-form>
    </div>

    <!-- Carrega o Vue e os scripts compilados -->
    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>