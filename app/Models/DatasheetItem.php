<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DatasheetItem
 *
 * @property int $id
 * @property string|null $datasheet_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DatasheetItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatasheetItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DatasheetItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|DatasheetItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatasheetItem whereDatasheetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatasheetItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatasheetItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DatasheetItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DatasheetItem extends Model
{
    use HasFactory;
}
