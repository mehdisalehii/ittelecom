<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\WidgetSubCategory
 *
 * @property int $id
 * @property string|null $id_category
 * @property string|null $thumb
 * @property string|null $slug
 * @property string $public
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory whereIdCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetSubCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WidgetSubCategory extends Model
{
    //
}
