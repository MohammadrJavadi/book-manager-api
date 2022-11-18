@props([
    "action", "method"=>"get", "enctype"=>""
])
<form action="{{ $action }}" method="{{ $method!="get"?"post":"get" }}" enctype="{{ $enctype }}">
    @csrf
    @method($method)
    <div class="row">
        {{ $slot }}
        @if($errors->any())
            <div class="col-sm-12 mt-3">
                <div class="alert alert-danger">First error:{{ $errors->first() }}</div>
            </div>
        @endif
        <div class="col-sm-12 text-right mt-3">
            <button class="btn btn-danger" type="reset">Reset</button>
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>
