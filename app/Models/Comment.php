<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $article_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment query()
 * @method static Builder|Comment whereArticleId($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereText($value)
 * @method static Builder|Comment whereTitle($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string $subject
 * @property string $body
 * @property-read Article $article
 * @method static Builder|Comment whereBody($value)
 * @method static Builder|Comment whereSubject($value)
 */
class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['subject', 'body'];

    /**
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
