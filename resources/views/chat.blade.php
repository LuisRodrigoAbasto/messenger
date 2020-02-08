@extends('layouts.app')

@section('content')
{{-- <messenger-component :user="{{ Auth::user() }}"></messenger-component> --}}
<router-view :user="{{ Auth::user() }}"></router-view>
@endsection
