@extends('layouts.app')
@section('title', 'Dettagli')
@section('content')
<section id="detail">
  {{-- header --}}
    <header>
        <h1 class="my-5">Dettaglio Azienda: </h1>
    </header>
    {{-- card --}}
    <div class="d-flex flex-column align-items-center">
        <div class="card col-6 mb-4">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="card-title">{{ $company->business_name }}</h3>
                    <h4 class="card-subtitle text-body-secondary my-4">{{ $company->status }}</h4>
                </div>
                <hr>
              <div class="d-flex">
                <strong class="me-2">Settore:</strong>
                <ul class="p-0 m-0 mb-2 list-unstyled">
                  @forelse ($company->sectors as $sector)
                      <li class="badge rounded-pill bg-success py-2 px-3">{{ $sector->name }}</li>
                  @empty
                      -
                  @endforelse
                </ul>
              </div>
              <div class="card-text mb-3"><strong>P.IVA: </strong>{{ $company->vat_number }}</div>
              <div class="card-text mb-3"><strong>Codice Fiscale: </strong>{{ $company->tax_id_code }}</div>
              <div class="card-text mb-3"><strong>Data inizio attività: </strong>{{ $company->activity_start_date }}</div>
              <div class="card-text mb-3"><strong>Rating: </strong>{{ $company->rating }}</div>
              <div class="card-text mb-3"><strong>Visura camerale: </strong>@if($company->chamber_of_commerce) <i class="fa-solid fa-check" style="color: green;"></i> @else <i class="fa-solid fa-x" style="color: red;"></i> @endif</div>
              <div class="card-text mb-3"><strong>Email: </strong>{{ $company->email }}</div>
              <div class="card-text mb-3"><strong>Telefono: </strong>{{ $company->phone_number }}</div>
              <div class="card-text mb-3"><strong>Username: </strong>{{ $company->username }}</div>
              <p class="card-text mb-3"><strong>Note: </strong>@if($company->notes) {{ $company->notes }} @else - @endif</p>
            </div>
          </div>
          {{-- buttons --}}
        <div class="d-flex mb-3">
          <a href="{{ route('admin.companies.index') }}" class="btn btn-primary">Torna Indietro</a>
          <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-warning mx-4">
            <i class="fa-solid fa-pencil"></i>
          </a>
          <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare questa azienda?')"><i class="fa-solid fa-trash"></i></button>
          </form>
        </div>
    </div>
  </section>
@endsection