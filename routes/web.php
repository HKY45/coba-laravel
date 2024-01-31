<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Mufaat Hadi Rosid",
        "email" => "mufaathadirosid@gmail.com",
        "image" => "mufaat.jpg"
    ]);
});

Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Mufaat Hadi Rosid",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Marina Lakshita Adiniggar",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?"
        ]
    ];

    return view('posts', [
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
});

//halaman single post
Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Mufaat Hadi Rosid",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Marina Lakshita Adiniggar",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?"
        ]
    ];

    $new_post = [];
    foreach ($blog_posts as $post) {
        if ($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    return view('post', [
        "title" => "Single Post",
        "post" => $new_post
    ]);
});
