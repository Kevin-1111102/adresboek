@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adres toevoegen</h1>

        <form method="POST" action="{{ route('adressen.store') }}">
            @csrf

            <div class="mb-3">
                <label for="naam" class="form-label">Naam</label>
                <input type="text" name="naam" id="naam" class="form-control @error('naam') is-invalid @enderror" value="{{ old('naam') }}" required>
                @error('naam')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>


            <div class="mb-3">
                <label for="adrs" class="form-label">adres</label>
                <input type="text" name="adres" id="adres" class="form-control @error('adres') is-invalid @enderror" value="{{ old('adres') }}" required>
                @error('adres')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
            <a href="{{ route('adressen.index') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
@endsection
