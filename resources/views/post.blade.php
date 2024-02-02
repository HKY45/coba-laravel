@extends('layouts.main')

@section('container')
  <article>
    <h2>{{ $post->title }}</h2>
    <p>By : <a href="#" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
    {!! $post->body !!}
  </article>

  <a href="/posts" class="d-block mt-4">Back to Posts</a>
@endsection
{{-- Post::create([
  'title' => "Judul Kedua",
  'category_id' => 3,
  'slug' => "judul-ketiga",
  'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing Ketiga",
  'body' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. </p><p>Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? </p><p>Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?</p>"
]) --}}