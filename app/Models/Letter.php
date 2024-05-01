<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Letter
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $page_size
 * @property string|null $theme
 * @property string|null $content
 * @property string|null $stamp
 * @property string|null $atta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Letter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereAtta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter wherePageSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereStamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Letter extends Model
{
    use HasFactory;
}
