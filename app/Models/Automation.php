<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Automation
 *
 * @property int $id
 * @property int|null $created_by
 * @property string|null $customer_name
 * @property string|null $customer_email
 * @property string|null $customer_company
 * @property string|null $customer_tel
 * @property string|null $customer_fax
 * @property string|null $customer_mob
 * @property string|null $customer_address
 * @property string|null $description
 * @property string|null $type
 * @property string|null $status
 * @property string|null $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Automation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Automation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Automation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCustomerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCustomerCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCustomerFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCustomerMob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereCustomerTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Automation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Automation extends Model
{
    //
}
