<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mdb.min.css" rel="stylesheet">
        <link href="css/style.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            body{
                background-image: url('img/HM.png');
                background-repeat: no-repeat; 
                background-size: contain;
                background-position: center;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <!--flex-center position-ref full-height-->
    <body>
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center" style="height: 39rem;">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a style="color:white; font-size: 1.4rem;" href="{{ url('/home') }}">Dashboard</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                @guest
                    <div class="contenedor-formulario-registro">
                        <h1 style="margin-bottom:2rem;">Iniciar sesión</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="control-label">{{ __('Correo electrónico') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Iniciar sesión') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="contenedor-formulario-registro">
                        <h1>Bienvenido</h1>
                        <a style="color:white; font-size: 1.4rem;" href="{{ url('/home') }}">Dashboard</a>
                    </div>
                @endguest

            </div>
        </div>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
