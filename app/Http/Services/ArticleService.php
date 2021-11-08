<?php

namespace App\Http\Services;

use App\Http\Services\Dto\CreateCommentDto;
use App\Jobs\CreateCommentJob;
use App\Models\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;

class ArticleService
{
    /**
     * @param $articleId
     * @throws ModelNotFoundException
     * @return int new counter
     */
    public function increaseLikesCounter($articleId): int
    {
        $cacheKey = Article::getLikesCountCashKey($articleId);

        if (!Cache::has($cacheKey)) {
            Cache::rememberForever(
                $cacheKey,
                function () use ($articleId) {
                    return Article::findOrFail($articleId)->likes_count;
                }
            );
        }

        return Cache::increment($cacheKey);
    }

    /**
     * @param $articleId
     * @throws ModelNotFoundException
     * @return int new counter
     */
    public function increaseViewsCounter($articleId): int
    {
        $cacheKey = Article::getViewsCountCashKey($articleId);

        if (!Cache::has($cacheKey)) {
            Cache::rememberForever(
                $cacheKey,
                function () use ($articleId) {
                    return Article::findOrFail($articleId)->views_count;
                }
            );
        }

        return Cache::increment($cacheKey);
    }
}
