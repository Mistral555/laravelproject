@extends('admin.admin')

@section('title', $option->exists ? 'Editer une option' : 'Ajouter une option')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.index')}}" class="btn btn-primary">Retour à la liste</a>
    </div>

    <form class="vstack gap-2" method="POST" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store' , $option) }}" enctype="multipart/form-data">
        @csrf
        @method($option->exists ? 'PUT' : 'POST')
        
        @include('shared.input', ['name' => 'name', 'label' => 'Nom',  'value' => $option->name])

        
        <button type="submit" class="btn btn-primary w-100">@if ($option->exists)
                Modifier
            @else
                Enregistrer
            @endif 
        </button>
    </form>
@endsection