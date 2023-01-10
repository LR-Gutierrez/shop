@extends('layouts.app')

@section('title', 'Inicio')    

@section('content')    
    <div class="container">
        <div class="info content">
            <h1>Registro de usuario</h1>
        </div>
        <div class="form">
            <div ><img class="w-50 pb-3" src="assets/images/user-icon.png"/></div>
            <form class="login-form" action="{{ route('login.register') }}" method="post">
                @csrf
                <div class="box box-info padding-1">
                    <div class="box-body">
                        
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su nombre']) }}
                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su correo electrónico']) }}
                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese una contraseña']) }}
                            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : ''), 'placeholder' => 'Repita su contraseña']) }}
                            {!! $errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                
                    </div>
                    <div class="box-footer mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection