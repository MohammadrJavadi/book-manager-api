@extends("layouts.auth")
@push("title")
    Forget password
@endpush
@push("page-title")
    <h1 class="">Forget password</h1>
{{--    <p class="">Log in to your account to continue.</p>--}}
@endpush
@section("content")
    <form action="{{ route("password.email") }}" class="text-left" method="post">
        @csrf
        <div class="form">
            <div id="email-field" class="field-wrapper input">
                <div class="d-flex justify-content-between">
                    <label for="email">EMAIL</label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                <input id="email" name="email" type="text" class="form-control" value="" placeholder="Email">
            </div>

            <div class="mt-2 mb-2 text-center">
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first() }}</p>
                @endif
            </div>

            <div class="d-sm-flex justify-content-between">

                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary" value="">Reset</button>
                </div>
            </div>
        </div>
    </form>
@endsection
