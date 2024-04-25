<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add new Customer</title>
  </head>
  <body>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>
    <div class="container">
    <h1>Add Customer</h1>
    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <div class="mb-3">
        <label for="id" class="form-label">Code</label>
        <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
        disabled="disabled">
        <div id="idHelp" class="form-text">Code Customer</div>
        </div>
        <div class="mb-3">
        <label for="document" class="form-label">Document Number</label>
        <input type="text" required class="form-control" id="document" aria-describedby="nameHelp" name="document"
        placeholder="Document number">
        </div>
        <div class="mb-3">
        <label for="firstname" class="form-label">First Name</label>
        <input type="text" required class="form-control" id="firstname" aria-describedby="nameHelp" name="firstname"
        placeholder="First name">
        </div>
        <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" required class="form-control" id="lastname" aria-describedby="nameHelp" name="lastname"
        placeholder="Last name">
        </div>
        <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" required class="form-control" id="address" aria-describedby="nameHelp" name="address"
        placeholder="Address">
        </div>
        <div class="mb-3">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" required class="form-control" id="birthdate" aria-describedby="nameHelp" name="birthdate"
        placeholder="Birthdate">
        </div>
        <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="number" required class="form-control" id="phone" aria-describedby="nameHelp" name="phone"
        placeholder="Phone number" min="1" max="9147483647" >
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" required class="form-control" id="email" aria-describedby="nameHelp" name="email"
        placeholder="Email customer">
        </div>
        
        <div class="mt-3">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('customers.index') }}" class="btn btn-warning">Cancel</a>
        </div>
</form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</x-app-layout>
