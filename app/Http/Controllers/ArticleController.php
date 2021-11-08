<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\TagResource;
use App\Http\Services\ArticleService;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ArticleCollection
     */
    public function index(): ArticleCollection
    {
        $articles = Article::lastAdded()
            ->paginate();

        $tags = TagResource::collection(Tag::all());

        return (new ArticleCollection($articles))->additional(['data' => ['tags' => $tags]]);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return ArticleResource
     */
    public function show(Article $article): ArticleResource
    {
        $article
            ->load('comments')
            ->load('tags');

        return new ArticleResource($article);
    }

    /**
     * @param $articleId
     * @param ArticleService $articleService
     * @return JsonResponse
     */
    public function increaseArticleLikesCounter($articleId, ArticleService $articleService): JsonResponse
    {
        $likesCount = $articleService->increaseLikesCounter($articleId);

        return new JsonResponse(
            [
                'status' => true,
                'data'   => [
                    'likes_count' => $likesCount
                ]
            ]
        );
    }

    /**
     * @param $articleId
     * @param ArticleService $articleService
     * @return JsonResponse
     */
    public function increaseArticleViewsCounter($articleId, ArticleService $articleService): JsonResponse
    {
        $viewsCount = $articleService->increaseViewsCounter($articleId);

        return new JsonResponse(
            [
                'status' => true,
                'data'   => [
                    'views_count' => $viewsCount
                ]
            ]
        );
    }
}
