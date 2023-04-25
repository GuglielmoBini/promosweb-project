@extends('layouts.app')
@section('title', 'Dettagli')
@section('content')
<section id="detail">
    <header>
        <h1 class="my-5">Dettaglio Azienda: </h1>
    </header>
    <div class="d-flex flex-column align-items-center">
        <div class="card col-6 mb-4">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="card-title">{{ $company->business_name }}</h3>
                    <h4 class="card-subtitle text-body-secondary my-4">{{ $company->status }}</h4>
                </div>
                <hr>
              {{-- <div class="card-text mb-3"><strong>Settore: </strong>{{ $company->sector }}</div> --}}
              <ul class="p-0 m-0 mb-3 list-unstyled">
                @forelse ($company->sectors as $sector)
                    <li><strong>Settore:</strong> {{ $sector->name }}</li>
                @empty
                    -
                @endforelse
              </ul>
              <div class="card-text mb-3"><strong>P.IVA: </strong>{{ $company->vat_number }}</div>
              <div class="card-text mb-3"><strong>Codice Fiscale: </strong>{{ $company->tax_id_code }}</div>
              <div class="card-text mb-3"><strong>Data inizio attività: </strong>{{ $company->activity_start_date }}</div>
              <div class="card-text mb-3"><strong>Rating: </strong>{{ $company->rating }}</div>
              <div class="card-text mb-3"><strong>Visura camerale: </strong>@if($company->chamber_of_commerce) <i class="fa-solid fa-check" style="color: green;"></i> @else <i class="fa-solid fa-x" style="color: red;"></i> @endif</div>
              <div class="card-text mb-3"><strong>Email: </strong>{{ $company->email }}</div>
              <div class="card-text mb-3"><strong>Telefono: </strong>{{ $company->phone_number }}</div>
              <div class="card-text mb-3"><strong>Username: </strong>{{ $company->username }}</div>
              <p class="card-text mb-3"><strong>Note: </strong>{{ $company->notes }}.</p>
            </div>
          </div>
        <div class="d-flex">
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