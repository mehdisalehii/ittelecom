<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserVerify
 *
 * @property int $user_id
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerify newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerify newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerify query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerify whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerify whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerify whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVerify whereUserId($value)
 * @mixin \Eloquent
 */
class UserVerify extends Model
{
    use HasFactory;
    public $table = "users_verify";

    protected $primaryKey = 'user_id';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}