<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\WidgetWhyUs
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $thumb
 * @property string|null $type
 * @property string $public
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs query()
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WidgetWhyUs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WidgetWhyUs extends Model
{
    //
}