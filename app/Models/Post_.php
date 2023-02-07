<?php

namespace App\Models;



class Post
{
    private  static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Kukuh Kurniawan",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa totam 
        facere ab eaque exercitationem? Vero perspiciatis
         velit natus exercitationem consequuntur sequi harum 
         quos dolore aliquam eum? Quae harum debitis facere."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Martin Garrix",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia et quod vel cumque. 
        Illum optio consequuntur consequatur nulla esse corrupti commodi, voluptate qui mollitia 
        nihil temporibus. Impedit ex laborum ipsum nam officiis! Earum voluptatum omnis ad asperiores 
        vel repudiandae deserunt veniam doloremque sint, corporis molestiae vitae, ullam non? Distinctio 
        architecto consequatur neque cupiditate in eius numquam iure qui temporibus omnis obcaecati nostrum ea, 
        libero nulla? Similique dolores sint assumenda voluptatum ducimus corrupti doloribus quis magni non suscipit 
        sed, maiores odit."
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

// $post = [];
// foreach ($posts as $p) {
//     if ($p["slug"] === $slug) {
//         $post = $p;
//     }
// }