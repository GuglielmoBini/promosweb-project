@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card text-center">
                <h3 class="card-header">{{ __('Dashboard Utente') }}</h3>

                <div class="card-body fs-3 text-success p-5">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Hai effettuato il Login con successo!') }}
                </div>
            </div>
        </div>
        <div class="col-3 text-center mt-5">
            <a class="btn btn-primary" href="{{ route('admin.companies.index') }}">{{ __('VAI ALLE AZIENDE') }}</a>
        </div>
    </div>
</div>
@endsection
