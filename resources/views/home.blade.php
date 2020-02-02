@extends('layouts.app')

@section('content')
<mensaje :user_id="{{ Auth::user()->id }}"></mensaje>
@endsection
