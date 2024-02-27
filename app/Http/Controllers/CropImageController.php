<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CropImage;

class CropImageController extends Controller
{
    public function index()
    {
        return view('crop-image-upload');
    }

    public function croppedImage(Request $request)
    {
        // dd($request);
        if ($request->cropped_image == null) {
            return redirect()->back()->with('error', 'Format gambar yang anda pilih bukan gambar! Gambar harus beformat JPG,PNG');
        }

        $folder = "img/post-images";
        $folderPath = public_path($folder);

        $image_parts = explode(";base64,", $request->cropped_image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageSize = strlen($image_base64);
        $imageSize = $imageSize / 1024;
        $maxSize = 2048;
        if ($imageSize > $maxSize) {
            return redirect()->back()->with('error', 'Ukuran gambar terlalu besar! Ukuran gambar harus dibawah 2MB');
        }

        $imageName = uniqid() . '.png';

        $imageFullPath = $folder . "/" . $imageName;
        $cropped_image = file_put_contents($imageFullPath, $image_base64);

        $saveFile = new CropImage;
        $saveFile->name = $imageFullPath;
        $saveFile->save();

        dd('berhasil');
    }
}
