<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Cookie
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Cookie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cookie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cookie query()
 * @mixin \Eloquent
 */
class Cookie extends Model
{
    //
}
