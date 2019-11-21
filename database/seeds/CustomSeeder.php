<?php

use Illuminate\Database\Seeder;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory("App\Article", 10)->create();
    //    for($i=0;$i<10;$i++){
    //         App\Article::create([
    //             "title"=>"This is the title",
    //             "description"=>"This is the description",
    //             "author"=>"This is the author"
    //         ]);
    //    }
    }
}
