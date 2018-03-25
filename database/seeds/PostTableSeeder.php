<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $post = new \App\Post([
       		'title' => 'Classical Guitar Patterns',
       		'content' => 'Best methods for learning left hand techniques'
       ]);
       $post->save();

       $post = new \App\Post([
       		'title' => 'Guiliani 120 Right Hand Studies',
       		'content' => 'Best methods for learning right hand techniques'
       ]);
       $post->save();
    }
}
