@extends('layouts.app')

@section('content')
<b-container>
        <b-row align-h="center">
            <b-col cols="8">
                    <b-card
                    title="Registro" class="my-3"
                  ><b-alert show>Por favor Ingrese sus Datos:</b-alert>
    
                    <b-form  method="POST" action="{{ route('register') }}">
                            @csrf

                            <b-form-group
                            label="Nombre"
                            label-for="name"
                            >
                            <b-form-input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}" required autofocus
                            ></b-form-input>
    
                            </b-form-group>
    
                            <b-form-group
                            label="Correo"
                            label-for="email"
                            >
                            <b-form-input
                            id="email"
                            email="email"
                            type="email"
                            value="{{ old('email') }}" required autofocus
                            placeholder="example@gmail.com"
                            ></b-form-input>
    
                            </b-form-group>

                            <b-form-group
                            label="Contraseña"
                            label-for="password"
                            >
                            <b-form-input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="new-password"
                            ></b-form-input>

                            </b-form-group>

                            <b-form-group
                            label="Confirmar Contraseña"
                            label-for="password-confirm"
                            >
                            <b-form-input
                            id="password-confirm"
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            required
                            >
                            </b-form-input>
                            </b-form-group>

                            <b-button type="submit" variant="primary">Registrar</b-button>
                            <b-button href="{{ route('login') }}" variant="link">Iniciar Sesion</b-button>
                       
                        </b-form>  
                </b-card>              
        </b-col> 
    </b-row>
</b-container>
@endsection
