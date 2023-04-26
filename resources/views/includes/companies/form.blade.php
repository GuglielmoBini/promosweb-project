<div class="card p-4 shadow">
    @if ($company->exists)
    <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data" novalidate>
    @method('PUT')
    @else    
    <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @endif
    @csrf
        <div class="row">
            {{-- ragione sociale --}}
            <div class="col-9">
                <div class="mb-3">
                    <label for="business_name" class="form-label">Ragione Sociale</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name', $company->business_name) }}" minlength="5" maxlength="50" required>
                    <small class="text-muted">Inserisci la ragione sociale</small>
                  </div>
            </div>
            {{-- tipo --}}
            <div class="col-3">
                <div class="mb-3">
                    <label for="status" class="form-label">Tipo</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">--</option>
                        <option @if(old('status', $company->status) == "Business") selected @endif value="Business">Business</option>
                        <option @if(old('status', $company->status) == "Privato") selected @endif value="Privato">Privato</option>
                      </select>
                    <small class="text-muted">Scegli la tipologia</small>
                  </div>
            </div>
            {{-- indirizzo --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $company->address) }}" required>
                    <small class="text-muted">Inserisci l'indirizzo</small>
                  </div>
            </div>
            {{-- P.IVA --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="vat_number" class="form-label">P.IVA</label>
                    <input type="text" class="form-control" id="vat_number" name="vat_number" value="{{ old('vat_number', $company->vat_number) }}" required>
                    <small class="text-muted">Inserisci la P.IVA</small>
                  </div>
            </div>
            {{-- codice fiscale --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="tax_id_code" class="form-label">Codice Fiscale</label>
                    <input type="text" class="form-control" id="tax_id_code" name="tax_id_code" value="{{ old('tax_id_code', $company->tax_id_code) }}" required>
                    <small class="text-muted">Inserisci il codice fiscale</small>
                  </div>
            </div>
            {{-- data inizio attività --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="activity_start_date" class="form-label">Data inizio attività</label>
                    <input type="text" class="form-control" id="activity_start_date" name="activity_start_date" value="{{ old('activity_start_date', $company->activity_start_date) }}" placeholder="GG/MM/AAAA" required>
                    <small class="text-muted">Inserisci data inizio attività</small>
                  </div>
            </div>
            {{-- rating --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select class="form-select" id="rating" name="rating">
                        <option value="">--</option>
                        <option @if(old('rating', $company->rating) == "A") selected @endif value="A">A</option>
                        <option @if(old('rating', $company->rating) == "B") selected @endif value="B">B</option>
                        <option @if(old('rating', $company->rating) == "C") selected @endif value="C">C</option>
                        <option @if(old('rating', $company->rating) == "D") selected @endif value="D">D</option>
                        <option @if(old('rating', $company->rating) == "E") selected @endif value="E">E</option>
                        <option @if(old('rating', $company->rating) == "F") selected @endif value="F">F</option>
                      </select>
                    <small class="text-muted">Scegli il rating</small>
                  </div>
            </div>
            {{-- visura camerale --}}
            <div class="col-4">
                <div class="mb-3">
                    <label for="chamber_of_commerce" class="form-label">Carica Visura Camerale</label>
                    <input type="file" class="form-control" id="chamber_of_commerce" name="chamber_of_commerce">
                    <small class="text-muted">Carica Visura Catastale</small>
                  </div>
            </div>
            {{-- note --}}
            <div class="col-12">
                <div class="mb-3">
                    <label for="notes" class="form-label">Note</label>
                    <textarea class="form-control" id="notes" rows="7" name="notes" required>{{ old('notes', $company->notes) }}</textarea>
                    <small class="text-muted">Inserisci una nota</small>
                  </div>
            </div>
            {{-- email --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $company->email) }}" maxlength="70" required>
                    <small class="text-muted">Inserisci l'Email</small>
                  </div>
            </div>
            {{-- numero telefono --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Numero telefono</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $company->phone_number) }}" maxlength="20" required>
                    <small class="text-muted">Inserisci numero di telefono</small>
                  </div>
            </div>
            {{-- username --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $company->username) }}" maxlength="50" required>
                    <small class="text-muted">Inserisci uno Username</small>
                  </div>
            </div>
            {{-- password --}}
            <div class="col-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $company->password) }}" maxlength="30" required>
                    <small class="text-muted">Inserisci la password</small>
                  </div>
            </div>
            {{-- settore --}}
            <div class="col-6">
                <div class="mb-3">Settore</div>
                @foreach($sectors as $sector)
                <input type="checkbox" value="{{$sector->id}}" id="sector-{{$sector->name}}" name="sectors[]"
                @if(in_array($sector->id, old('sectors', $company_sectors ?? []))) checked @endif>
                <label class="me-2" for="sector-{{$sector->name}}">
                    {{$sector->name}}
                </label>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center my-3">
            <button type="submit" class="btn btn-success w-25">Salva</button>
        </div>
    </form>
</div>
<a href="{{ route('admin.companies.index') }}" class="btn btn-primary my-3">Torna Indietro</a>

{{-- @section('scripts')
    <script>
        const placeholder = 'https://marcolanci.it/utils/placeholder.jpg';

        const imageInput = document.getElementById('image_url');
        const imagePreview = document.getElementById('img-preview');

        imageInput.addEventListener('change', () => {
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.readAsDataURL(imageInput.files[0]);
                reader.onload = e => {
                    imagePreview.setAttribute('src', e.target.result);
                }
            } else imagePreview.setAttribute('src', placeholder);
        });
    </script>
@endsection --}}