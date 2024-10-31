<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10) -> create();

        $postIds = collect();
        for ($i = 0; $i < 20; $i++){
            $p = Post::factory() -> create([
                'author_id' => $users -> random() -> id  // 1:N kapcsolat seedelése
            ]);
            $postIds -> add($p -> id);
        }

        $categories = Category::factory(5) -> create();
        foreach($categories as $c){
            $c -> posts() -> attach($postIds -> random(rand(0, count($postIds)))); // N:N kapcsolat seedelése
        }
    }
}
