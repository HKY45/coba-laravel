@extends('layouts.main')

@section('container')
<div class="main-wrapper">
    <section class="section blog-wrap bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 mb-5">
                <div class="single-blog-item">
                    <div class="blog-item-content bg-white p-3">
                    <h2 class="mt-3 mb-4 text-center"><a href="#">{{ $post->title }}</a></h2>
                      @if ($post->image)
                      <div class="d-flex justify-content-center align-items-center mb-3">
                        <img style="width: 60%; height: auto;" src="{{ asset('storage/'. $post->image) }}" alt="" class="img-fluid rounded" />
                      </div>
                      @else
                        <img src="https://source.unsplash.com/1220x500?{{ $post->category->name }}" alt="" class="img-fluid rounded mb-3" />
                      @endif
                      
                    <div class="blog-item-meta bg-gray py-2 px-2">
                      <a href="/posts?category={{ $post->category->slug }}"><span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>{{ $post->category->name }}</span></a>
                      <span class="text-muted text-capitalize mr-3"><i class="ti-time mr-1"></i> {{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    <p class="pt-3">
                      {!! $post->body !!}
                    </p>

                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="posts-nav bg-white p-5 d-lg-flex d-md-flex justify-content-between">
                  
                  @if ($previous==null)
                    <a class="post-prev align-items-center" href="#">
                      <div class="posts-prev-item mb-4 mb-lg-0">
                        <span class="nav-posts-desc text-color">- Previous Post</span>
                        <h6 class="nav-posts-title mt-1">. . .</h6>
                      </div>
                    </a>
                  @else
                    <a class="post-prev align-items-center" href="/posts/{{ $previous->slug }}">
                      <div class="posts-prev-item mb-4 mb-lg-0">
                        <span class="nav-posts-desc text-color">- Previous Post</span>
                        <h6 class="nav-posts-title mt-1">{{ substr($previous->title, 0, 23)." . . ." }}</h6>
                      </div>
                    </a>
                  @endif

                  <div class="border"></div>

                  @if ($next==null)
                    <a class="posts-next" href="#">
                      <div class="posts-next-item pt-4 pt-lg-0">
                        <span class="nav-posts-desc text-lg-right text-md-right text-color d-block">- Next Post</span>
                        <h6 class="nav-posts-title mt-1">. . .</h6>
                      </div>
                    </a>
                  @else
                    <a class="posts-next" href="/posts/{{ $next->slug }}">
                      <div class="posts-next-item pt-4 pt-lg-0">
                        <span class="nav-posts-desc text-lg-right text-md-right text-color d-block">- Next Post</span>
                        <h6 class="nav-posts-title mt-1">{{ substr($next->title, 0, 23)." . . ." }}</h6>
                      </div>
                    </a>
                  @endif

                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar-wrap">
              <div class="sidebar-widget card border-0 mb-3">
                <div class="d-flex justify-content-center mt-3">
                  <img src="https://source.unsplash.com/400x400?quotes" alt="" class="img-fluid rounded" style="max-width: 200px"/>
                </div>
                <div class="card-body p-4 text-center">
                  <a href="/posts?author={{ $post->author->username }}">
                    <h5 class="mb-0 mt-4">{{ $post->author->name }}</h5>
                  </a>
                  <p>{{ $post->author->username }}</p>
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

              <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                <h5>Latest Posts</h5>

                @foreach ($latestPosts as $post)
                  <div class="media border-bottom py-3">
                    <div class="media-body">
                      <h6 class="my-2"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h6>
                      <a href="/posts?category={{ $post->category->slug }}"><span class="text-sm text-black">{{ $post->category->name }}</span></a>
                      <br>
                      <span class="text-sm text-muted">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                  </div>
                @endforeach
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection