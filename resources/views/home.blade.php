@extends('layouts.app')

@section('content')
<b-container fluid style="height: calc(100vh - 56px);">
    <b-row no-gutters>
        <b-col cols="4">
            
            <contacto-lista></contacto-lista>
            
        </b-col>
        <b-col cols="8"> 
            <contacto-activo></contacto-activo>
        </b-col>
    </b-row>
</b-container>
@endsection
