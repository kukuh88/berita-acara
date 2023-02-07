<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kukuh Kurniawan',
            'username' => 'kukuhkurniawan',
            'email' => 'kukuh@gmail.com',
            'password' => bcrypt('password')
        ]);

        //data palsu
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing'
        ]);
        
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);


        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => "Judul Pertama",
        //     'slug' => "judul-pertama",
        //     'excerpt' => "Lorem Ke Pertama dolor, sit amet consectetur adipisicing elit",
        //     'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda necessitatibus accusantium tempore ex
        //         nihil enim consequatur vero sint odio optio at ea voluptate quisquam maiores minus doloremque, eveniet deserunt
        //         dolorem omnis asperiores. Animi, nesciunt eius sequi fuga iusto voluptas quaerat qui consequatur adipisci </p><p>consequuntur, id mollitia voluptatibus? Voluptate necessitatibus asperiores corporis delectus in sunt soluta odio?
        //         Id iusto dolorem quidem cupiditate repellendus recusandae placeat aliquam, praesentium doloribus pariatur corrupti
        //         numquam repudiandae sunt inventore nesciunt atque ab odio tenetur commodi necessitatibus omnis ut.
        //         Soluta ipsam sit.</p><p>laborum non est, illum, consequuntur cupiditate placeat praesentium expedita, facilis commodi sint nobis a tempora
        //         accusantium natus quidem accusamus impedit temporibus eaque? Fugiat, tempore similique itaque eveniet corrupti
        //         quaerat minima earum beatae harum possimus rem ipsa animi at optio, doloribus laudantium molestias, dicta hic labore
        //         totameum quibusdam. Quod modi debitis, officia, quos laboriosam accusamus veniam culpa, animi quasi voluptates
        //         blanditiis nisi repellendus quibusdam nobis.</p>",
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => "Judul Dua",
        //     'slug' => "judul-dua",
        //     'excerpt' => "Lorem Ke Pertama dolor, sit amet consectetur adipisicing elit",
        //     'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda necessitatibus accusantium tempore ex
        //         nihil enim consequatur vero sint odio optio at ea voluptate quisquam maiores minus doloremque, eveniet deserunt
        //         dolorem omnis asperiores. Animi, nesciunt eius sequi fuga iusto voluptas quaerat qui consequatur adipisci </p><p>consequuntur, id mollitia voluptatibus? Voluptate necessitatibus asperiores corporis delectus in sunt soluta odio?
        //         Id iusto dolorem quidem cupiditate repellendus recusandae placeat aliquam, praesentium doloribus pariatur corrupti
        //         numquam repudiandae sunt inventore nesciunt atque ab odio tenetur commodi necessitatibus omnis ut.
        //         Soluta ipsam sit.</p><p>laborum non est, illum, consequuntur cupiditate placeat praesentium expedita, facilis commodi sint nobis a tempora
        //         accusantium natus quidem accusamus impedit temporibus eaque? Fugiat, tempore similique itaque eveniet corrupti
        //         quaerat minima earum beatae harum possimus rem ipsa animi at optio, doloribus laudantium molestias, dicta hic labore
        //         totameum quibusdam. Quod modi debitis, officia, quos laboriosam accusamus veniam culpa, animi quasi voluptates
        //         blanditiis nisi repellendus quibusdam nobis.</p>",
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => "Judul Tiga",
        //     'slug' => "judul-tiga",
        //     'excerpt' => "Lorem Ke Pertama dolor, sit amet consectetur adipisicing elit",
        //     'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda necessitatibus accusantium tempore ex
        //         nihil enim consequatur vero sint odio optio at ea voluptate quisquam maiores minus doloremque, eveniet deserunt
        //         dolorem omnis asperiores. Animi, nesciunt eius sequi fuga iusto voluptas quaerat qui consequatur adipisci </p><p>consequuntur, id mollitia voluptatibus? Voluptate necessitatibus asperiores corporis delectus in sunt soluta odio?
        //         Id iusto dolorem quidem cupiditate repellendus recusandae placeat aliquam, praesentium doloribus pariatur corrupti
        //         numquam repudiandae sunt inventore nesciunt atque ab odio tenetur commodi necessitatibus omnis ut.
        //         Soluta ipsam sit.</p><p>laborum non est, illum, consequuntur cupiditate placeat praesentium expedita, facilis commodi sint nobis a tempora
        //         accusantium natus quidem accusamus impedit temporibus eaque? Fugiat, tempore similique itaque eveniet corrupti
        //         quaerat minima earum beatae harum possimus rem ipsa animi at optio, doloribus laudantium molestias, dicta hic labore
        //         totameum quibusdam. Quod modi debitis, officia, quos laboriosam accusamus veniam culpa, animi quasi voluptates
        //         blanditiis nisi repellendus quibusdam nobis.</p>",
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => "Judul Empat",
        //     'slug' => "judul-empat",
        //     'excerpt' => "Lorem Ke Pertama dolor, sit amet consectetur adipisicing elit",
        //     'body' => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda necessitatibus accusantium tempore ex
        //         nihil enim consequatur vero sint odio optio at ea voluptate quisquam maiores minus doloremque, eveniet deserunt
        //         dolorem omnis asperiores. Animi, nesciunt eius sequi fuga iusto voluptas quaerat qui consequatur adipisci </p><p>consequuntur, id mollitia voluptatibus? Voluptate necessitatibus asperiores corporis delectus in sunt soluta odio?
        //         Id iusto dolorem quidem cupiditate repellendus recusandae placeat aliquam, praesentium doloribus pariatur corrupti
        //         numquam repudiandae sunt inventore nesciunt atque ab odio tenetur commodi necessitatibus omnis ut.
        //         Soluta ipsam sit.</p><p>laborum non est, illum, consequuntur cupiditate placeat praesentium expedita, facilis commodi sint nobis a tempora
        //         accusantium natus quidem accusamus impedit temporibus eaque? Fugiat, tempore similique itaque eveniet corrupti
        //         quaerat minima earum beatae harum possimus rem ipsa animi at optio, doloribus laudantium molestias, dicta hic labore
        //         totameum quibusdam. Quod modi debitis, officia, quos laboriosam accusamus veniam culpa, animi quasi voluptates
        //         blanditiis nisi repellendus quibusdam nobis.</p>",
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
