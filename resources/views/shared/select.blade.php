@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    
    <select name="{{ $name }}[]" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror" multiple>
        @foreach ($options as $option => $op)
            <option @selected($value->contains($option)) value="{{$option}}">{{$op}}</option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>