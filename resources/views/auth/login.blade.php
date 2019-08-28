@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
                <b-card
                title="Inicio de Sesion" class="my-3"
              ><b-alert show>Por favor Ingrese sus Datos:</b-alert>

                <b-form method="POST" action="{{ route('login') }}">
                        @csrf
                        <b-form-group
                        label="Correo Electronico:"
                        label-for="email"
                        >
                        <b-form-input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="example@email.com"
                        value="{{ old('email') }}" required autofocus
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
                        ></b-form-input>

                        </b-form-group>
                    <b-form-group>
                        <b-form-checkbox
                        name="remember"
                        {{ old('remember') ? 'checked="true"' : '' }}
                      >Recordar Sesion
                      </b-form-checkbox>
                    </b-form-group>
                            <b-button type="submit" variant="primary">Ingresar</b-button>
                            <b-button href="{{ route('password.request') }}" variant="link">Olvidaste tu Contraseña</b-button>
                   
                    </b-form>  
            </b-card>
            
        </b-col> 
    </b-row>
</b-container>
@endsection
