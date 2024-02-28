@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div> 

<div class="col-lg-8">
    @if (session()->has('error'))  
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<div class="col-lg-8">
    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" name="cropped_image" id="cropped-image-input">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title', $post->title) }}">
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ( $categories as $category)
                    @if (old('category_id', $post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            <input type="file" name="image" class="image form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            @if ($post->image)
                <img src="{{ asset($post->image) }}" class="img-preview img-fluid mt-3 d-block" id="cropped-image" style="max-height: 200px; overflow:hidden; border-radius: 5px;">
            @else
            <div>
                <img src="" class="img-preview img-fluid mt-3" id="cropped-image" style="max-height: 200px; overflow:hidden; border-radius: 5px;">
            </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" class="img-fluid" style="border-radius: 5px">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="crop">Crop Image</button>
            </div>
        </div>
    </div>
</div>

<script>
    const title=document.querySelector('#title');
    const slug=document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    function preview() {
            frame.src=URL.createObjectURL(event.target.files[0]);
    }
</script>

<script>
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e){
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show'); // Menampilkan modal ketika gambar dipilih
        };

        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 0,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas();

        var croppedImage = canvas.toDataURL(); // Mendapatkan data gambar yang dipotong dalam bentuk Base64

        // Menutup modal setelah tombol Crop ditekan
        $('#modal').modal('hide');

        // Menyimpan data gambar Base64 ke dalam input tersembunyi di dalam formulir
        $('#cropped-image-input').val(croppedImage);

        // Menampilkan gambar yang dipotong langsung di luar modal
        $('#cropped-image').attr('src', croppedImage);
        $('#cropped-image').show();
    });

</script>
@endsection