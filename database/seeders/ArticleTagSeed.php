<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Tag::factory()->count(10)->create();
        $tags = Tag::all();
        $articles = Article::all();

        foreach ($articles as $article) {
            $tagIds = $tags->random(2)->pluck('id')->all();
            $article->tags()->sync($tagIds);
        }
    }
}
