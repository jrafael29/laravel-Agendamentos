<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="refresh" content="20"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('fullCalendar/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    
<header class="bg-dark">
    <x-header/>
</header>

<main>
<div class="container">
    @yield('main')
</div>
</main>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('fullCalendar/main.min.js')}}"></script>
<script src="{{asset('assets/js/painel/script.js')}}"></script>
<script src="{{asset('assets/js/painel/notificacao.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>