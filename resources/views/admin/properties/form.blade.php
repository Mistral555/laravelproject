@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Ajouter un bien')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.property.index')}}" class="btn btn-primary">Retour à la liste</a>
    </div>

    <form class="vstack gap-2" method="POST" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store' , $property) }}" enctype="multipart/form-data">
        @csrf
        @method($property->exists ? 'PUT' : 'POST')

        <div class="row">
            
            @include('shared.input', ['class'=>'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])

            <div class="col row">
                @include('shared.input', ['class'=>'col', 'name' => 'surface', 'value' => $property->surface])
                @include('shared.input', ['class'=>'col', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
            </div>
        </div>

        @include('shared.input', ['type'=>'textarea', 'name' => 'description', 'value' => $property->description])

        <div class="row">
            @include('shared.input', ['class'=>'col', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
            @include('shared.input', ['class'=>'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['class'=>'col', 'label' => 'Etage', 'name' => 'floor', 'value' => $property->floor])
        </div>
        <div class="row">
            @include('shared.input', ['class'=>'col', 'label' => 'Adresse', 'name' => 'adress', 'value' => $property->adress])
            @include('shared.input', ['class'=>'col', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
            @include('shared.input', ['class'=>'col', 'label' => 'Code postal', 'name' => 'postal_code', 'value' => $property->postal_code])
        </div>

        @include('shared.select', ['name' => 'options', 'label' => 'Options',  'value' => $property->options()->pluck('id'), 'multiple' => true , 'options' => $options])
        @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold])

        <button type="submit" class="btn btn-primary w-100">@if ($property->exists)
                Modifier
            @else
                Enregistrer
            @endif 
        </button>
    </form>
@endsection