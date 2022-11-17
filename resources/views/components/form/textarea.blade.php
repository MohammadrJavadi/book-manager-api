@props([
    "name", "id", "label", "text"=>null
])
<label for="{{ $id }}" class="col-form-label">{{ $label }}</label>
<textarea name="{{ $name }}" id="{{ $id }}" class="form-control">{{ old($name, $text) }}</textarea>
@error($name)
<p class="text-danger">{{ $message }}</p>
@enderror
