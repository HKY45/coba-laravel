@extends('layouts.main')

@section('container')
<div class="row justify-content-center" style="margin-top: 20px">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <img src="https://source.unsplash.com/1200x600?singapore" class="card-img-top rounded mb-3" alt="japan">
            <form action="/register" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}">
                    @error('name')  
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" value="{{ old('username') }}">
                    @error('username')  
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                    @error('email')  
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    @error('password')  
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <button class="w-100 btn btn-lg btn-primary mt-3 rounded" type="submit">Register</button>
                    </div>
                </div>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login Here!</a></small>
        </main>
    </div>
</div>
@endsection