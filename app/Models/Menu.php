<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property string|null $content_bottom
 * @property string|null $thumb
 * @property string|null $sku
 * @property string $class_name
 * @property string $type
 * @property int $parent
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Menu> $submenu
 * @property-read int|null $submenu_count
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereClassName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereContentBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    //

    use HasFactory;

    // public function menu_main()
    // {
    //     return $this->hasMany(Menu::class, 'parent')->where('type','==','product')->where('parent','==','0')->orderBy('sort','ASC');
    // }

    public function submenu()
    {
        return $this->hasMany(self::class, 'parent')->orderBy('sort', 'ASC');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function faqs()
    {
        return $this->belongsTo(FAQ::class, 'id', 'menu_id');
    }
}
