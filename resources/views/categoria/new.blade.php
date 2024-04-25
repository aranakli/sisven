<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nueva Categoria</title>
</head>


<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categorias') }}
            </h2>
        </x-slot>
        <div class="container">
            <h1>Nueva Categoria</h1>
            <form method="POST" action="{{ route('categorias.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id" class="p-1 text-gray-900">Código</label>
                    <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                        disabled="disabled">
                    <div id="idHelp" class="form-text">Código de la categoria</div>
                </div>
                <div class="mb-3">
                    <label for="name" class="p-1 text-gray-900">Categoria</label>
                    <input type="text" require class="form-control" id="name" aria-describedby="nameHelp"
                        name="name" placeholder="Nombre de la categoria">
                </div>
                <div class="mb-3">
                    <label for="description" class="p-1 text-gray-900">Descripción</label>
                    <input type="text" require class="form-control" id="name" aria-describedby="nameHelp"
                        name="description" placeholder="Descripcion de la categoria">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('comunas.index') }}" class="btn btn-warning">Cancelar</a>
                </div>
            </form>
        </div>
    </x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
