<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 100)->create()->each(function(Post $post) {
        	$post->tags()->sync([
        		rand(1,5),
        		rand(6,14),
        		rand(15,20)
        	]);
        });
    }
}
