<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Paymode</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Customers') }}
            </h2>
        </x-slot>
        <div class="container">
            <h1>Edit Paymode</h1>
            <form method="POST" action="{{ route('paymode.update', ['pay_mode' => $pay_mode->id]) }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="codigo" class="form-label">Code</label>
                    <input type="text" class="form-control" id="id" aria-describedby="codigoHelp"
                        name="id" disabled="disabled" value="{{ $pay_mode->id }}">
                    <div id="codigoHelp" class="form-text">Code Paymode</div>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Name</label>
                    <input type="text" required class="form-control" id="nombre" name="nombre"
                        placeholder="Name" value="{{ $pay_mode->name }}">
                </div>
                <div class="mb-3">
                    <label for="observacion" class="form-label">Observation</label>
                    <input type="text" required class="form-control" id="observacion" name="observacion"
                        placeholder="Observation" value="{{ $pay_mode->observation }}">
                </div>


                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('paymode.index') }}" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </x-app-layout>
</body>

</html>
