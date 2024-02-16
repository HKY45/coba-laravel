@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-4">
      <div class="col-lg-8">
        <h1 class="mb-3">{{ $post->title }}</h1>
        
        <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
        <a href="" class="btn btn-primary"><span data-feather="edit"></span> Edit post</a>
        <a href="" class="btn btn-danger"><span data-feather="x-circle"></span> Delete post</a>
        
        <img src="https://source.unsplash.com/1220x500?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid">

        <article class="my-3 fs-6">
          {!! $post->body !!}
        </article>
        
      </div>
    </div>
  </div>
@endsection