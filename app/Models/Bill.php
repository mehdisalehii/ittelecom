<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Bill
 *
 * @property int $id
 * @property int $order_no
 * @property string|null $hash
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $company
 * @property string|null $description
 * @property int $total_amount
 * @property string $signature
 * @property string|null $ordered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereOrderedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereUserId($value)
 * @mixin \Eloquent
 */
class Bill extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
