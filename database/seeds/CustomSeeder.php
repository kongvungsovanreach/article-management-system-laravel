<?php

use Illuminate\Database\Seeder;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0;$i<2;$i++){
        //     App\Article::create([
        //         "title"=>"The title",
        //         "description"=>"The description",
        //         "author"=>"The author"
        //     ]);
        // }

            factory("App\Article", 5)->create();


    }
}
