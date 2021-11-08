<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * @return ArticleCollection
     */
    public function index(): ArticleCollection
    {
        $articles = Article::lastAdded(6)
            ->get()
            ->all();

        return new ArticleCollection($articles);
    }
}
