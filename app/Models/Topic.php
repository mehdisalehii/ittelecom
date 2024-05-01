<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Topic
 *
 * @property int $id
 * @property int $parent_id
 * @property int $comment_parent_id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $content
 * @property int $author_id
 * @property string|null $thumb
 * @property string|null $cat
 * @property string|null $tag
 * @property int $answer
 * @property int $vote
 * @property int $view
 * @property string|null $robots
 * @property string $type
 * @property string|null $sku
 * @property int $number
 * @property string|null $brand
 * @property int $price
 * @property string|null $redirect
 * @property int $status
 * @property string $publish
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCommentParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic wherePublish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereRobots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereView($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereVote($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
