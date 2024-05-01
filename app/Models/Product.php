<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use JordanMiguel\LaravelPopular\Traits\Visitable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Tags\HasTags;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $thumb
 * @property string|null $title
 * @property string|null $content
 * @property string|null $detials
 * @property string|null $robots
 * @property string|null $cat
 * @property string|null $tag
 * @property string|null $sku
 * @property string|null $sku_n
 * @property int $brand
 * @property string|null $pdf
 * @property string|null $zip
 * @property string $publish
 * @property int $view
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDetials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePublish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRobots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSkuN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereView($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereZip($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;
    // https://github.com/jordanmiguel/laravel-popular
    use Visitable;
    use HasTags;

    public $timestamps = false;
}
