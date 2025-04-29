@extends('admin.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Les biens</h1>
        <a href="{{ route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
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
            @foreach($properties as $property)
                <tr>{{$property->title}}</tr>
                <tr>{{$property->surface}} m²</tr>
                <tr>{{number_format($property->price, thousands_separator: ' ')}}</tr>
                <tr>{{$property->city}}</tr>
            @endforeach
        </tbody>
    </table>

    {{$properties->links()}}
@endsection
