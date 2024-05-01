<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OldTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OldTag extends Model
{
    //
}
