@extends('layouts.app')
@section('title', 'Registro Aziende')
@section('content')
    <header>
        <h1 class="my-5">Aziende</h1>
        <a href="{{ route('admin.companies.create') }}" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Aggiungi</a>
        <form action="{{ route('admin.companies.index') }}" method="GET" class="d-flex">
            <select class="form-select" name="status_filter">
              <option value="">Tutte</option>
              <option @if ($status_filter === 'Business') selected @endif value="Business">Business</option>
              <option @if ($status_filter === 'Privato') selected @endif value="Privato">Privato</option>
            </select>
            <button class="btn btn-primary ms-3" type="submit">Filtra</button>
          </form>
    </header>
    <table class="table">
        <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Ragione Sociale</th>
              <th scope="col">Tipo</th>
              <th scope="col">Settore</th>
              <th scope="col">P. IVA</th>
              <th scope="col">CF</th>
              <th scope="col">Indirizzo</th>
              <th scope="col">Data inizio attività</th>
              <th scope="col">Rating</th>
              <th scope="col">Email</th>
              <th scope="col">Telefono</th>
              <th scope="col">Username</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($companies as $company)
            <tr class="text-center">
                <th scope="row" class="border-start">{{ $company->id }}</th>
                <td>{{ $company->business_name }}</td>
                <td>{{ $company->status }}</td>
                <td>
                    <ul class="p-0 m-0 list-unstyled">
                        @forelse ($company->sectors as $sector)
                            <li>{{ $sector->name }}</li>
                        @empty
                            -
                        @endforelse
                    </ul>
                </td>
                <td>{{ $company->vat_number }}</td>
                <td>{{ $company->tax_id_code }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->activity_start_date }}</td>
                <td>{{ $company->rating }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->phone_number }}</td>
                <td>{{ $company->username }}</td>
                <td class="border">
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('admin.companies.show', $company->id) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-warning mx-3">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare questa azienda?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr> 
            @empty
                <tr>
                    <th scope="row" colspan="5" class="text-center">Non sono presenti Aziende</th>
                </tr>
            @endforelse            
          </tbody>
    </table>
@endsection