@extends('layouts.app')

@section('content')
<profile-component :user="{{ Auth::user() }}"
csrf-token="{{csrf_token() }}"></profile-component>
@endsection
