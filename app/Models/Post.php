<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use JordanMiguel\LaravelPopular\Traits\Visitable;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $thumb
 * @property string|null $title
 * @property string|null $content
 * @property string|null $robots
 * @property string|null $cat
 * @property string|null $related_cat
 * @property string|null $tag
 * @property int $author
 * @property string $publish
 * @property string $type
 * @property int $view
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRelatedCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRobots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereView($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    // https://github.com/jordanmiguel/laravel-popular
    use Visitable;
    public $timestamps = false;
}
