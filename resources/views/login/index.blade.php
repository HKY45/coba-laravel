@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
            <img src="https://source.unsplash.com/1200x600?singapore" class="card-img-top rounded mb-3" alt="japan">
            <form>
            
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
            
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
            <a href="https://instagram.com/mufaat.__.hr" target="_blank" class="text-decoration-none text-center"><p class="mt-3 mb-3 text-muted">&copy; Hikayya Rosie</p></a>
        </main>
    </div>
</div>
@endsection