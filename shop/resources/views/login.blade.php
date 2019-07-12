<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ТЕСТ</title>
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/iofrm-theme4.css')}}">
</head>
<body>
    <div class="form-body" class="container-fluid">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo" style="background: url({{asset('login/images/logo.jpg')}}); background-size: cover;">
                    
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg" style="background: url({{asset('login/images/bg.jpg')}}); background-position: center; background-size: cover;"></div>
                <div class="info-holder">
                    <img src="" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        
                        <h3>Вход в личный кабинет.</h3>
                        <p>Зайдите в свой личный кабинет чтобы посмотреть свои покупки</p>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="page-links">
                            <a href="/login2" class="active">Логин</a><a href="/register1">Регистрация</a>
                        </div>
                        <form method="post" action="/login1">
                            @csrf
                            <input class="form-control" type="email" name="email" placeholder="Email" required>
                            <input class="form-control" type="password" name="password" placeholder="Пароль" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Зайти</button>
                            </div>
                        </form>
                        <p style="font-size: 15px;">Авторские права "Команда 8" 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="{{asset('login/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('login/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('login/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('login/js/main.js')}}"></script>
</body>
</html>