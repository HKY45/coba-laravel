<!DOCTYPE html>
<html>
<head>
<title>Laravel 9 Crop Image Before Upload Using Cropper JS - CodingSeeker</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
</head>
<style type="text/css">
    body{
        background:#f6d352; 
    }
   h2{
        font-weight: bold;
        font-size:20px;
    }
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        text-align: center;
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    input{
        margin-top:40px;
    }
    .section{
        margin-top:150px;
        background:#fff;
        padding:50px 30px;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
<body>
    @if (session()->has('error'))  
        <div class="alert alert-danger alert-dismissible fade show" role="alert" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
            
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 section text-center">
                <h2>Laravel 9 Crop Image Before Upload Using Cropper JS - CodingSeeker</h2>
                <input type="file" name="image" class="image form-control @error('cropped_image') is-invalid @enderror">
                @error('cropped_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 offset-md-2 text-center ">
            <img id="cropped-image" class="img-fluid" style="display: none;">
        </div>
    </div>

    <form id="image-form" action="/cropped" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Input untuk menyimpan data gambar Base64 -->
        <input type="hidden" name="cropped_image" id="cropped-image-input">
        <!-- Tambahkan input lain yang diperlukan di sini -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <button class="w-100 btn btn-lg btn-primary mt-3 rounded" type="submit">Register</button>
            </div>
        </div>
    </form>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">How to crop image before upload image in laravel 9 CodingSeeker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>

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
</body>
</html> 