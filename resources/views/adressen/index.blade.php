@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Mijn Adresboek</h2>
        <a href="{{ route('adressen.create') }}" class="btn btn-success mb-3">Nieuw adres toevoegen</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Adres</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($adressen as $adres)
                <tr id="adres-{{ $adres->id }}">
                    <td>{{ $adres->naam }}</td>
                    <td>{{ $adres->adres }}</td>
                    <td>
                        <a href="{{ route('adressen.edit', $adres->id) }}" class="btn btn-warning btn-sm">Bewerken</a>
                        <button class="btn btn-danger btn-sm" onclick="verwijderAdres({{ $adres->id }})">Verwijderen</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function verwijderAdres(id) {
            if (confirm('Weet je zeker dat je dit adres wilt verwijderen?')) {
                axios.delete(`/adressen/${id}`)
                    .then(response => {
                        document.getElementById(`adres-${id}`).remove();
                    })
                    .catch(error => {
                        alert('Verwijderen mislukt.');
                    });
            }
        }
    </script>
@endsection
