<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
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

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
