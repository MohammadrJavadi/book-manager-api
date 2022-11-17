@props([
    "action", "method"=>"get", "enctype"=>""
])
<form action="{{ $action }}" @if($method=="post" || $method=="get") method="{{ $method }}" @endif enctype="{{ $enctype }}">
    @csrf
    @if($method !== "post" || $method!== "get")
        @method(strtoupper($method))
    @endif
    <div class="row">
        {{ $slot }}
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <div class="col-sm-12 text-right mt-3">
            <button class="btn btn-danger" type="reset">Reset</button>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>
