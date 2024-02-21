@extends('layouts.main')

@section('container')
<!--  Section category Start -->
    <section class="section latest-blog bg-2">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
              <div class="section-title">
                <h3 class="mt-3 content-title text-white">Categories</h3>
              </div>
            </div>
          </div>
  
          <div class="row justify-content-center">
  
            @foreach ($categories as $category)
              <div class="col-lg-4 col-md-6 mb-5">
                <div class="card bg-transparent border-0">
                    <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img-top" alt="{{ $category->name }}">

                    <div class="card-body mt-2">
  
                    <h3 class="mt-1 mb-3 lh-36"><a href="/posts?category={{ $category->slug }}" class="text-white ">{{ $category->name }}</a></h3>
                  </div>
                </div>
              </div>
            @endforeach
  
          </div>
        </div>
    </section>
@endsection