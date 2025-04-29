@extends('admin.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Les biens</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>

    <table class="table table-striped">
        <thead>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Actions</th>
        </thead>

        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->surface }} m²</td>
                    <td>{{ number_format($property->price, thousands_separator: ' ') }}</td>
                    <td>{{ $property->city }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-warning me-2">Modifier</a>
                            <form method="POST" action="{{ route('admin.property.destroy', $property) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $properties->links() }}
@endsection
