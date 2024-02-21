<header class="navigation">
  <nav class="navbar navbar-expand-lg py-4" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html" style="font-weight: bold;">
        Hikayya<span>Ink</span>
      </a>

      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
      </button>
    
      <div class="collapse navbar-collapse text-center" id="navbarsExample09">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/" style="{{ ($active === "home") ? 'font-weight: bold; color: #6f96ff;' : '' }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about" style="{{ ($active === "about") ? 'font-weight: bold; color: #6f96ff;' : '' }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts" style="{{ ($active === "posts") ? 'font-weight: bold; color: #6f96ff;' : '' }}">All Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categories" style="{{ ($active === "categories") ? 'font-weight: bold; color: #6f96ff;' : '' }}">Categories</a>
          </li>
        </ul>

        <ul class="navbar-nav">
          @auth
            <li class="nav-item dropdown">
              {{-- <a href="#" class="btn btn-solid-border btn-round-full" id="navbarDropdown" role="button" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false"> --}}
              <a class="btn btn-solid-border btn-round-full dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </ul>
            </li>
          @else
            <form class="form-lg-inline my-2 my-md-0 ml-lg-4 text-center">
              <a href="/login" class="btn btn-solid-border btn-round-full">Login</a>
            </form>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
</header>