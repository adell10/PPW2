@extends('layouts.app')

@section('title', 'CAMERRA - Sign In')

@section('content')
<div class="row w-100 justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="signin-container p-5" style="background:#6d2323; border-radius:15px; box-shadow:0 10px 30px rgba(0,0,0,0.3);">
            <h1 class="signin-header" style="color:#fef9e1; font-family:Anton, sans-serif; font-size:4rem;">Sign In</h1>

           @include('partials.alert')

            <form method="POST" action="/login">
                @csrf
                <div class="mb-4">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-light">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection