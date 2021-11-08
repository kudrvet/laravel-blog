<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $label
 * @property string $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Tag newModelQuery()
 * @method static Builder|Tag newQuery()
 * @method static Builder|Tag query()
 * @method static Builder|Tag whereCreatedAt($value)
 * @method static Builder|Tag whereId($value)
 * @method static Builder|Tag whereLabel($value)
 * @method static Builder|Tag whereUpdatedAt($value)
 * @method static Builder|Tag whereUrl($value)
 * @mixin Eloquent
 * @property-read Collection|Article[] $articles
 * @property-read int|null $articles_count
 * @method static TagFactory factory(...$parameters)
 */
class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    /**
     * @return BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Article::class,
            table: 'articles_tags_pivot',
            foreignPivotKey:'tag_id',
            relatedPivotKey: 'article_id'
        );
    }
}
