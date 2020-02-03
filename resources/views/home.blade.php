@extends('layouts.app')

@section('content')
<mensaje :user="{{ Auth::user() }}"></mensaje>
@endsection
