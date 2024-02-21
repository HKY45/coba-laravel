@extends('layouts.main')

@section('container')
    <div class="main-wrapper">
        <section class="page-title bg-1">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block text-center">
                  <span class="text-white">Our blog</span>
                  <h1 class="text-capitalize mb-4">{{ $title }}</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
  
        <section class="section blog-wrap bg-gray">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="row">

                    @if ($posts->count()) 
                    @foreach ($posts as $post) 
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item">
                                @if ($post->image)
                                    <img src="{{ asset('storage/'. $post->image) }}" alt="" class="img-fluid rounded" />
                                @else
                                    <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" alt="" class="img-fluid rounded" />
                                @endif
            
                                <div class="blog-item-content bg-white p-3">
                                    <div class="blog-item-meta py-1 px-2">
                                        <a href="/posts?category={{ $post->category->slug }}"><span class="text-muted text-capitalize mr-3">| {{ $post->category->name }} |</span></a>
                                        <a href="/posts?author={{ $post->author->username }}"><span class="text-muted text-capitalize mr-3">| {{ $post->author->name }} |</span></a>
                                    </div>
            
                                    <h3 class="mt-3 mb-3"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                    <p class="mb-2">{{ $post->excerpt }}</p>
            
                                    <small class="text-muted">
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                    <br><br>
                                    <a href="/posts/{{ $post->slug }}" class="btn btn-small btn-main btn-round-full">Open Letter</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p class="text-center fs-4">No posts found!</p>
                    @endif
                </div>
              </div>

              <div class="col-lg-4">
                <div class="sidebar-wrap">

                  <div class="sidebar-widget search card p-4 mb-3 border-0">
                    <form action="/posts" method="GET">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <input type="text" class="form-control" aria-label="search" placeholder="search" name="search" value="{{ request('search') }}"/>
                        <button class="btn btn-mian btn-small d-block mt-2" type="submit" style="border-radius: 5px">Search</button>
                    </form>
                  </div>
  
                  <div class="sidebar-widget card border-0 mb-3">
                    <img src="megakit-2/images/blog/blog-author.jpg" alt="" class="img-fluid" />
                    <div class="card-body p-4 text-center">
                      <h5 class="mb-0 mt-2">{{ $filter }}</h5>
                      <p>Digital Marketer</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, dolore.</p>
  
                      <ul class="list-inline author-socials">
                        <li class="list-inline-item mr-3">
                          <a href="#"><i class="fab fa-facebook-f text-muted"></i></a>
                        </li>
                        <li class="list-inline-item mr-3">
                          <a href="#"><i class="fab fa-twitter text-muted"></i></a>
                        </li>
                        <li class="list-inline-item mr-3">
                          <a href="#"><i class="fab fa-linkedin-in text-muted"></i></a>
                        </li>
                        <li class="list-inline-item mr-3">
                          <a href="#"><i class="fab fa-pinterest text-muted"></i></a>
                        </li>
                        <li class="list-inline-item mr-3">
                          <a href="#"><i class="fab fa-behance text-muted"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>
            </div>
  
            <div class="row mt-2">
              <div class="col-lg-8">
                <nav class="navigation pagination py-2 d-inline-block">
                    <div class="d-flex justify-content-end">
                        {{ $posts->onEachSide(0)->links() }}
                    </div>
                </nav>
              </div>
            </div>
          </div>
        </section>
    </div>
@endsection