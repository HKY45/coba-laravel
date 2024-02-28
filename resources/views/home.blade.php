@extends('layouts.main')

@section('container')
  <div class="main-wrapper">
    <!-- Slider Start -->
    <section class="slider">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-10">
            <div class="block">
              <span class="d-block mb-3 text-white text-capitalize">Blue: Serenity, Depth, Timeless Beauty.</span>
              <h1 class="animated fadeInUp mb-5" style="font-size: 50px">Missing you dearly, <br>my love, <br>longing for your warm embrace.</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--  Section Services Start -->
    <section class="section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
              <h2 class="content-title" style="color: #6f96ff">As blue as you</h2>
          </div>
        </div>
      </div>
    </section>
    <!--  Section Services End -->

    <!-- Section Cta Start --> 
    <section class="section cta">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="cta-item  bg-white p-5 rounded">
              <h2 class="mt-2 mb-2">Tuangkan perasaanmu dengan tinta.</h2>
              <p class="lead mb-4">Simpanlah air matamu, yang akan kau tuangkan sebagai air mata kebahagiaan nanti.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  Section Cta End-->

    <!--  Section divider Start -->
    <section class="section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
              <h5 class="content-title" style="color: #6f96ff">Take a moment, read my heartfelt expression. It speaks volumes beyond words 💖</h5>
          </div>
        </div>
      </div>
    </section>
    <!--  Section divider End -->
    
    <!--  Section category Start -->
    <section class="section latest-blog bg-2">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="section-title">
              <h3 class="mt-3 content-title text-white">In the silent echoes of my heart, lie the unspoken words about you.</h3>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">

          @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 mb-5">
              <div class="card bg-transparent border-0">
                @if ($post->image)
                  <img src="{{ asset($post->image) }}" alt="" class="img-fluid rounded" >
                @else
                  <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}" alt="" class="img-fluid rounded" >
                @endif

                <div class="card-body mt-2">
                  <div class="blog-item-meta">
                    <a href="/posts?category={{ $post->category->slug }}" class="text-white-50">{{ $post->category->name }} |</a>
                    <a href="/posts?author={{ $post->author->username }}" class="text-white-50 ml-2"><i class="fa fa-user mr-2"></i>{{ $post->author->name }}</a>
                  </div> 

                  <h3 class="mt-3 mb-3 lh-36"><a href="#" class="text-white ">{{ $post->title }}</a></h3>

                  <a href="/posts/{{ $post->slug }}" class="btn btn-small btn-solid-border btn-round-full text-white">Open Letter</a>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>

    <section class="mt-70 position-relative">
      <div class="container">
      <div class="cta-block-2 bg-gray p-5 rounded border-1">
        <div class="row justify-content-center align-items-center ">
          <div class="col-lg-7">
            <h2 class="mt-2 mb-4 mb-lg-0">"We can through this together, right?"</h2>
          </div>
        </div>
      </div>
    </div>

    </section>
    
  </div>
@endsection