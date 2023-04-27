@extends('layouts.app')
@section('title', 'Benvenuto')
@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-10 text-center">
        <h1 class="my-5">Benvenuto</h1>
        @guest
            <h3 class="mb-5">Effettua il Login</h3>
            <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
        @endguest
        @auth    
            <h3 class="mb-5">Premi il pulsante sottostante per essere indirizzato alla nostra lista aziende</h3>
            <a class="btn btn-primary" href="{{ route('admin.companies.index') }}">{{ __('VAI ALLE AZIENDE') }}</a>
        @endauth
    </div>
</div>
@endsection