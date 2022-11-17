@props([
    "name", "id", "label", "type"=>"text", "value"=>null
])
<label for="{{ $id }}" class="col-form-label">{{ $label }}</label>
<input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}">
@error($name)
<p class="text-danger">{{ $message }}</p>
@enderror
