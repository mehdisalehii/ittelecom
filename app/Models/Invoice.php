<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Invoice
 *
 * @property int $id
 * @property int $order_no
 * @property string|null $hash
 * @property int $created_by
 * @property string|null $company_id
 * @property string $show_company
 * @property string|null $headerfooter
 * @property string $price_unit
 * @property string $invoice_type
 * @property string $signature
 * @property string|null $tax
 * @property int $total_amount
 * @property string|null $description
 * @property string|null $customer_name
 * @property string|null $customer_email
 * @property string|null $customer_tel
 * @property string|null $customer_economynum
 * @property string|null $customer_regnationalnum
 * @property string|null $customer_zipcode
 * @property string|null $customer_city
 * @property string|null $customer_country
 * @property string|null $customer_fax
 * @property string|null $customer_mob
 * @property string|null $customer_address
 * @property string|null $ordered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerEconomynum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerMob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerRegnationalnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCustomerZipcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereHeaderfooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereOrderedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePriceUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereShowCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    //
}
