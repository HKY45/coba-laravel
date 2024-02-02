<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Mufaat Hadi Rosid',
            'email' => 'mufaathadirosid@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Marina Lakshita Adinigar',
            'email' => 'lakshita009@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Web Programmuing',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'Personal'
        ]);

        Post::create([
            'title' => "Judul Pertama",
            'slug' => "judul-pertama",
            'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing Ketiga",
            'body' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. </p><p>Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? </p><p>Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?</p>",
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Post::create([
            'title' => "Judul Kedua",
            'slug' => "judul-kedua",
            'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing Ketiga",
            'body' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. </p><p>Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? </p><p>Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?</p>",
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Post::create([
            'title' => "Judul Ketiga",
            'slug' => "judul-ketiga",
            'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing Ketiga",
            'body' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. </p><p>Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? </p><p>Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?</p>",
            'category_id' => 2,
            'user_id' => 1,
        ]);

        Post::create([
            'title' => "Judul Keempat",
            'slug' => "judul-keempat",
            'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing Ketiga",
            'body' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste tempore unde praesentium deserunt, veniam adipisci cum vitae, expedita ipsam totam quam. </p><p>Suscipit, quaerat placeat porro quasi quisquam ab hic facilis alias iure, quos nemo eligendi, itaque consectetur aspernatur ad numquam? Accusantium nulla labore exercitationem pariatur consequatur. Ut itaque quae similique, eveniet architecto impedit cumque nesciunt iure. Totam odio tempore porro. Mollitia cupiditate quia, accusantium iure accusamus consequuntur inventore praesentium eos tenetur necessitatibus tempore temporibus culpa qui, sint dolore explicabo autem enim dolores labore dolor sit aspernatur? </p><p>Maxime repudiandae sapiente accusamus vero libero. Aspernatur blanditiis eligendi nobis nemo necessitatibus odit ad, dignissimos unde illo explicabo odio quod ab harum consectetur dolores voluptatibus eaque debitis aperiam eius delectus ex ut! Cupiditate eius aliquam laudantium excepturi sunt aperiam ea, illum rerum doloremque eos consequatur tempore autem unde expedita ad. Fugit quibusdam officia natus. Saepe sequi perspiciatis facilis voluptatem non ipsa quod? Sequi, officiis?</p>",
            'category_id' => 2,
            'user_id' => 2,
        ]);
    }
}
