@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adres bewerken</h1>

        <form method="POST" action="{{ route('adressen.update', $adres->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="naam" class="form-label">Naam</label>
                <input type="text" name="naam" id="naam" class="form-control @error('naam') is-invalid @enderror"
                       value="{{ old('naam', $adres->naam) }}" required>
                @error('naam')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="adres" class="form-label">adres</label>
                <input type="text" name="adres" id="adres" class="form-control @error('adres') is-invalid @enderror"
                       value="{{ old('adres', $adres->adres) }}" required>
                @error('adres')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>



            <button type="submit" class="btn btn-primary">Bijwerken</button>
            <a href="{{ route('adressen.index') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
@endsection
