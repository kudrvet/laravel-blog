<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $cover
 * @property int $likes_count
 * @property int $views_count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static Builder|Article query()
 * @method static Builder|Article whereCover($value)
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article whereLikesCount($value)
 * @method static Builder|Article whereText($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @method static Builder|Article whereViewsCount($value)
 * @mixin Eloquent
 * @property string $slug
 * @property-read Collection|Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @method static ArticleFactory factory(...$parameters)
 * @method static Builder|Article whereSlug($value)
 * @method static Builder|Article lastAdded($count = null)
 * @property-read int $cashed_likes_count
 * @property-read int $cashed_views_count
 */
class Article extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @param $articleId
     * @return string
     */
    public static function getLikesCountCashKey($articleId): string
    {
        return "article/{$articleId}/likes";
    }

    /**
     * @param $articleId
     * @return string
     */
    public static function getViewsCountCashKey($articleId): string
    {
        return "article/{$articleId}/views";
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Tag::class,
            table: 'articles_tags_pivot',
            foreignPivotKey:'article_id',
            relatedPivotKey: 'tag_id'
        );
    }

    /**
     * @param Builder $query
     * @param null $count
     * @return Builder
     */
    public function scopeLastAdded(Builder $query, $count = null): Builder
    {
        $query->orderBy('created_at', 'desc');

        if (!is_null($count)) {
            $query->limit($count);
        }

        return $query;
    }


    /**
     * @return int
     */
    public function getCashedLikesCountAttribute(): int
    {
        $cacheKey = self::getLikesCountCashKey($this->id);

        return $count = Cache::rememberForever(
            $cacheKey,
            function () {
                return $this->likes_count;
            }
        );
    }

    /**
     * @return int
     */
    public function getCashedViewsCountAttribute(): int
    {
        $cacheKey = self::getViewsCountCashKey($this->id);

        return $count = Cache::rememberForever(
            $cacheKey,
            function () {
                return $this->views_count;
            }
        );
    }
}
