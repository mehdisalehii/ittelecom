<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property int $parentId
 * @property string|null $title
 * @property string|null $name
 * @property string|null $logo
 * @property string|null $economynum
 * @property string|null $regnationalnum
 * @property string|null $email
 * @property string|null $adderss
 * @property string|null $city
 * @property string|null $county
 * @property string|null $zipcode
 * @property string|null $telnum
 * @property string|null $fax
 * @property string|null $mobile
 * @property string|null $stamp
 * @property string|null $job
 * @property int $firstnum
 * @property string|null $number_last
 * @property string|null $styled
 * @property string|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAdderss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEconomynum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFirstnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereNumberLast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereRegnationalnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereStamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereStyled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTelnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereZipcode($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    //
    public $timestamps = false;
}
