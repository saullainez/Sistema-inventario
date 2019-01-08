@extends('layouts.principal')
@section('content')
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
                        <a style="color:white; font-size: 1.4rem;" href="{{ url('/home') }}">Ir al Dashboard</a>
                    </div>
                @endguest

            </div>
@endsection
