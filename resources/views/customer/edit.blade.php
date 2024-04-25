<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Customer</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Customers') }}
            </h2>
        </x-slot>
        <div class="container">
            <h1>Edit Customer</h1>
            <form method="POST" action="{{ route('customers.update', ['customer' => $customer->id]) }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="codigo" class="form-label">Code</label>
                    <input type="text" class="form-control" id="id" aria-describedby="codigoHelp"
                        name="id" disabled="disabled" value="{{ $customer->id }}">
                    <div id="codigoHelp" class="form-text">Code Customer</div>
                </div>
                <div class="mb-3">
                    <label for="document" class="form-label">Document Number</label>
                    <input type="number" required class="form-control" id="document" name="document"
                        placeholder="Document customer" value="{{ $customer->document_number }}">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">First name</label>
                    <input type="text" required class="form-control" id="firstname" name="firstname"
                        placeholder="First name customer" value="{{ $customer->first_name }}">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last name</label>
                    <input type="text" required class="form-control" id="lastname" name="lastname"
                        placeholder="Last name customer" value="{{ $customer->last_name }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" required class="form-control" id="address" name="address"
                        placeholder="Address customer" value="{{ $customer->address }}">
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Birthdate</label>
                    <input type="date" required class="form-control" id="birthdate" name="birthdate"
                        placeholder="Birthdate customer" value="{{ $customer->birthdate }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="number" required class="form-control" id="phone" name="phone"
                        placeholder="Phone number customer" min="1" max="9147483647" value="{{ $customer->phone_number }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" required class="form-control" id="email" name="email"
                        placeholder="Email customer" value="{{ $customer->email }}">
                </div>
                

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </x-app-layout>
</body>

</html>
