@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-6" style="margin-top: 20px">
    <div class="col-lg-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            @if (session()->has('success'))  
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))  
                <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <img src="https://source.unsplash.com/1200x600?singapore" class="card-img-top rounded mb-3" alt="japan">
            <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email" placeholder="name@example.com" autofocus value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <button class="w-100 btn btn-lg btn-primary mb-2 rounded" type="submit">Login</button>
                    </div>
                </div>
            </form>
            <small class="d-block text-center">Not Registered? <a href="/register">Register Now!</a></small>
        </main>
    </div>
</div>
@endsection