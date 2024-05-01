<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'home'])->name('home');
Route::get('/tags/{tag}', [\App\Http\Controllers\Web\TagController::class, 'show'])->name('show-tag');
Route::get('/aboutus', [\App\Http\Controllers\Web\PageController::class, 'pageInfo'])->name('about');
Route::get('/contactus', [\App\Http\Controllers\Web\PageController::class, 'pageInfo'])->name('contact');
Route::get('/certificates', [\App\Http\Controllers\Web\PageController::class, 'pageInfo'])->name('certificate');
Route::get('/sitemap.xml', [\App\Http\Controllers\Web\SitemapController::class, 'sitemap'])->name('primary-sitemap');
Route::get('/blog', [\App\Http\Controllers\Web\PostController::class, 'blog'])->name('blog');
Route::get('/shop', [\App\Http\Controllers\Web\ProductController::class, 'shop'])->name('shop');
Route::get('/products/cat', [\App\Http\Controllers\Web\ProductController::class, 'category'])->name('products_cat');
Route::get('/search', [\App\Http\Controllers\Web\SearchController::class, 'SearchPage'])->name('search');
Route::get('/forum/', [\App\Http\Controllers\Web\TopicController::class, 'forum'])->name('forum.index');
Route::get('/forum/products', [\App\Http\Controllers\Web\TopicController::class, 'forumProduct'])->name('forum.products');
Route::get('/forum/questions/users', [\App\Http\Controllers\Web\TopicController::class, 'forumUsers'])->name('forum.users');
Route::post('/search/{keyword}', [\App\Http\Controllers\Web\FetchController::class, 'Fetch_URL_Search']);
Route::post('/category/article/{url}', [\App\Http\Controllers\Web\FetchController::class, 'Fetch_URL_Blog_CAT']);
Route::post('/products/cat/{main_cat}', [\App\Http\Controllers\Web\FetchController::class, 'Fetch_URL_CAT_Product']);
Route::post('/{url_fetch}', [\App\Http\Controllers\Web\FetchController::class, 'Fetch_URL']);
Route::get('/blog/{url}', [\App\Http\Controllers\Web\PostController::class, 'show'])->name('post');
Route::get('/blog/preview/{url}', [\App\Http\Controllers\Web\PostController::class, 'preview'])->name('preview-post');
Route::get('/shop/{url}', [\App\Http\Controllers\Web\ProductController::class, 'show'])->name('product');
Route::get('/shop/{url}/{ignorea?}/{ignoreb?}/{ignorec?}', [\App\Http\Controllers\Web\ProductController::class, 'redirectToProduct'])->name('redirectToProduct');
Route::get('/author/{url}', [\App\Http\Controllers\Web\AuthorController::class, 'Author_URL'])->name('author');
Route::get('/products/cat/{main_cat}/{sub_cat?}/{child_cat?}', [\App\Http\Controllers\Web\CategoryController::class, 'categoryProduct']);
Route::get('/forum/{url}', [\App\Http\Controllers\Web\TopicController::class, 'topic'])->name('forum.topic');
Route::get('/forum/products/{url}', [\App\Http\Controllers\Web\TopicController::class, 'forumCategoryProduct'])->name('forum.category.product');
Route::get('/forum/cats/{url}', [\App\Http\Controllers\Web\TopicController::class, 'forumCategory'])->name('forum.category.topic');
Route::get('/dl/zip/{url}', [\App\Http\Controllers\Web\ZipController::class, 'download']);
Route::get('/assets/icons/{url}', [\App\Http\Controllers\Web\ImageController::class, 'svg']);
Route::get('/category/article/{url}', [\App\Http\Controllers\Web\CategoryController::class, 'categoryPost'])->where('child_cat', '(.*)');
Route::get('/search/{keyword}', [\App\Http\Controllers\Web\SearchController::class, 'SearchPage_keyword']);
Route::get('/dl/catalog/{url}', [\App\Http\Controllers\Admin\DatasheetController::class, 'pdf']);
Route::post('/forum/cats/post/{topic}', [\App\Http\Controllers\Web\TopicController::class, 'submitNewReplyInTopic'])->name('forum.category.topic.reply');
Route::post('/forum/{menu}/topic/create', [\App\Http\Controllers\Web\TopicController::class, 'createNewTopic'])->name('forum.category.topic.create');
//Route::redirect('/webmail', 'http:/' . '/mail' . '.ittelecom.ir', 301);
//Route::redirect('/roundcube', 'http:/' . '/mail' . '.ittelecom.ir', 301);
//Route::fallback(function(){ return abort(404); });
/// Image for Error 404 by Author (SEO)
// Route::get('/images/uploads/images/uploads/picture/post/{url?}', 'ImageController@getPostImageError')->where('url', '(.*)');
/// Images Files Storage
// Route::get('/images/{name?}', 'ImageController@getImage')->name('image.show')->where('name', '(.*)');
Route::any('/shop/amp', [\App\Http\Controllers\Admin\RedirectController::class, 'notFound']);
Route::any('/{url?}', [\App\Http\Controllers\Admin\RedirectController::class, 'check'])->where('url', '(.*)');
