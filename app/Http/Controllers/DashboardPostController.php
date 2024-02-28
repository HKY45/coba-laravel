<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if ($request->cropped_image == null) {
            return redirect()->back()->with('error', 'Gambar kosong atau format gambar yang anda pilih bukan gambar! Gambar harus beformat JPG,PNG')->withInput();
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
            return redirect()->back()->with('error', 'Ukuran gambar terlalu besar! Ukuran gambar harus dibawah 2MB')->withInput();;
        }

        $imageName = uniqid() . '.png';

        Storage::disk('public_uploads')->put('img/post-images/' . $imageName, $image_base64);
        $imageFullPath = $folder . "/" . $imageName;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        $saveFile = new Post;
        $saveFile->category_id = $validatedData['category_id'];
        $saveFile->user_id = $validatedData['user_id'];
        $saveFile->title = $validatedData['title'];
        $saveFile->slug = $validatedData['slug'];
        $saveFile->image = $imageFullPath;
        $saveFile->excerpt = $validatedData['excerpt'];
        $saveFile->body = $validatedData['body'];
        $saveFile->save();

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $imageFullPath = $request->oldImage;
        // dd($imageFullPath);
        if ($request->cropped_image == null) {
            return redirect()->back()->with('error', 'Gambar belum diganti atau format gambar yang anda pilih bukan gambar! Gambar harus beformat JPG,PNG')->withInput();
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
            return redirect()->back()->with('error', 'Ukuran gambar terlalu besar! Ukuran gambar harus dibawah 2MB')->withInput();
        }

        $imageName = uniqid() . '.png';

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::disk('public_uploads')->delete($request->oldImage);
            }
            Storage::disk('public_uploads')->put('img/post-images/' . $imageName, $image_base64);
            $imageFullPath = $folder . "/" . $imageName;
        }

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        } else {
            $rules['slug'] = 'required';
        };

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        $id = $post->id;
        $postUpdate = Post::find($id);
        $postUpdate->category_id = $validatedData['category_id'];
        $postUpdate->user_id = $validatedData['user_id'];
        $postUpdate->title = $validatedData['title'];
        $postUpdate->slug = $validatedData['slug'];
        $postUpdate->image = $imageFullPath;
        $postUpdate->excerpt = $validatedData['excerpt'];
        $postUpdate->body = $validatedData['body'];
        $postUpdate->save();

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public_uploads')->delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
