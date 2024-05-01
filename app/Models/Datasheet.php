<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Datasheet
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $features
 * @property string|null $content
 * @property string|null $thumb
 * @property string|null $sku
 * @property string|null $sku_n
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereSkuN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Datasheet whereUserId($value)
 * @mixin \Eloquent
 */
class Datasheet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
