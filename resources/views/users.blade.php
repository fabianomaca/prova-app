<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>


<body>
    <div id="app">
        <!-- Aqui o componente Vue irá listar os usuários -->
        <user-list></user-list>
    </div>

    <!-- Carrega o Vue e os scripts compilados -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>