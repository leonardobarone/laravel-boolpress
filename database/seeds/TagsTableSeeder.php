<?php

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            "frontend",
            "backend",
            "design patters",
            "ux",
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::of($tag)->slug('_');
            $newTag->save();
        }
    }
}
