<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function show(string $tag_string){
        $products = Product::withAnyTags([$tag_string], 'user-defined-tags')->where(function ($query) {
            $query->where('publish', 'publish')->orWhere('publish', 'on');
        })->where('thumb', '!=', '')->orderBy('created_at', 'DESC')->get();
        $data = array(
            'tag_string' => $tag_string,
            'products' => $products
        );
        abort_if($products->count() == 0, 404);
        return view('web.tags-index', $data);
    }
}
