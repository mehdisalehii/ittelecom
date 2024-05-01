<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Redirect
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $redirect_to
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect query()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereRedirectTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Redirect extends Model
{
    //
}
