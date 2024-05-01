<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\WidgetMainCategory
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $thumb
 * @property string $cat
 * @property string $style
 * @property string $public
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory whereCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory whereStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetMainCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WidgetMainCategory extends Model
{
    //
}
