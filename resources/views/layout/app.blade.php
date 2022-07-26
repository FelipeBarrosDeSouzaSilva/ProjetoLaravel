<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro de Produtps</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <style>
        body{
            padding:0;
            margin: 0;
        }
        .navbar{
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @component('component.navbar', ["current"=>$current])
            
        @endcomponent
        <main role="main">
            @hasSection ('body')
                @yield('body')
            @endif
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="js/categoria-produtos.js"></script>
</body>
</html>