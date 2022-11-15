@extends("layouts.auth")
@push('title')
    Sign in
@endpush
@section("style")
    <style>
        .form-form .form-form-wrap form .field-wrapper input{
            padding: 10px;
        }
    </style>
@endsection
@push("page-title")
    <h1 class="">Sign In</h1>
    <p class="">Log in to your account to continue.</p>
@endpush
@section("content")
    <form action="{{ route("login") }}" method="post" class="text-left">
        @csrf
        <div class="form">

            <div id="username-field" class="field-wrapper input">
                <label for="phone">Phone</label>
                <input id="phone" name="phone" type="text" class="form-control" placeholder="e.g John_Doe">
            </div>

            <div id="password-field" class="field-wrapper input mb-2">
                <div class="d-flex justify-content-between">
                    <label for="password">PASSWORD</label>
                    <a href="{{ route("password.request") }}" class="forgot-pass-link">Forgot Password?</a>
                </div>
                <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </div>
            <div class="mt-2 mb-2 text-center">
                @if($errors->any())
                    <p class="text-danger">{{ $errors->first() }}</p>
                @endif
            </div>
            <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                </div>
            </div>
        </div>
    </form>
@endsection
