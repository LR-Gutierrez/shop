@extends('layouts.app')

@section('title', 'Inicio')    

@section('content')    
    <div class="container">
        <div class="info content">
            <h1>BIENVENIDOS!</h1>
            @if (session('login_status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('login_status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('login_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('login_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="form">
            <div ><img class="w-50 pb-3" src="assets/images/user-icon.png"/></div>
            <form class="login-form" action="{{ route('login.login') }}" method="post">
                @csrf

                @error('email')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                <input name="email" type="email" title="Ingrese su email" placeholder="Email" maxlength="30"/>

                @error('password')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                <input name="password" type="password" title="Ingrese su contraseña" placeholder="Contraseña" maxlength="30"/>
            <button type="submit" class="mt-3" title="Ingrese sus credenciales de acceso y presione Ingresar">Ingresar</button>
            </form>
        </div>
    </div>
@endsection