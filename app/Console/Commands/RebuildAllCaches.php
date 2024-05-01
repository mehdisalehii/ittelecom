<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Console\Command;

class RebuildAllCaches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ittelecom:rebuild-caches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        cache()->flush();
        cache()->remember('aria.menuWhereTypeIsProductAndParentIsZero', 518400, function () {
            return \App\Models\Menu::orderBy('sort', 'ASC')->where('type', '=', 'product')->where('parent', '=', '0')->get();
        });
        cache()->remember('aria.components.app.navlist.products', 518400, function () {
            return \App\Models\Product::orderBy('id', 'ASC')->where('thumb', '!=', '')->get();
        });
        cache()->remember('aria.components.app.navlist.menu.row_subs', 518400, function () {
            return cache()->remember('aria.menuAll', 518400, function () {
                return \App\Models\Menu::orderBy('sort', 'ASC')->get();
            });
        });
        cache()->remember('aria.controllers.web.show.category_blog', 518400, function () {
            return Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
        });
        $this->info('menu caches built');
        $this->_cacheAllBlogPosts();
        $this->info('blog posts caches built');
        $this->_cacheCommonDataUsedInSomePages();
        $this->info('common caches built');
        return Command::SUCCESS;
    }

    private function _cacheCommonDataUsedInSomePages(): void
    {
        $paginationSize = 5;
        $pageNumber = 0;
        $data = true;
        while (!empty($data)) {
            $pageNumber++;
            if ($pageNumber >= 100) {
                break;
            }
            $data = cache()->remember('aria.controllers.web.post.blog.posts.' . $pageNumber, 518400, function () use ($pageNumber, $paginationSize) {
                $category_blog = cache()->remember('aria.controllers.web.post.show.category_blog', 518400, function () {
                    return Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
                });
                $slideshow = Post::where('type', 'post')->where('thumb', '!=', '')->where('publish', 'on')->orderBy('created_at', 'DESC')->limit(6)->get();
                $postsQuery = Post::where('type', 'post')
                    ->where('thumb', '!=', '')
                    ->where(function ($query) {
                        $query->where('publish', 'publish')->orWhere('publish', 'on');
                    })
                    ->orderBy('created_at', 'DESC');
                if ($pageNumber < 2) {
                    $postsQuery = $postsQuery->whereNotIn('id', $slideshow->pluck('id'));
                }
                $posts = $postsQuery->paginate($paginationSize, ['*'], 'page', $pageNumber);
                $posts_visit = Post::popularMonth()->where('type', 'post')->where('thumb', '!=', '')->where('publish', 'on')->limit(10)->get();
                $reading = Post::where('type', 'post')->where('thumb', '!=', '')->where(function ($query) {
                    $query->where('publish', 'publish')->orWhere('publish', 'on');
                })->orderBy('created_at', 'DESC')->limit(15)->get();
                $users = User::orderBy('id', 'DESC')->get();
                $data = array(
                    'category_blog' => $category_blog,
                    'posts' => $posts,
                    'posts_visit' => $posts_visit,
                    'slideshow' => $slideshow,
                    'reading' => $reading,
                    'users' => $users,
                );
                return $data;
            });
        }
    }

    private function _cacheAllBlogPosts(): void
    {
        $posts = Post::whereNotNull('slug')->get();
        $pageNumber = 0;
        $paginationSize = 10;
        $maxPage = ($posts->count() / $paginationSize) + 3;
        $cachedData = true;
        foreach ($posts as $post) {
            $this->info(sprintf('%s pageNumber', $pageNumber));
            cache()->remember('aria.controllers.web.show.categories.id' . $post->id, 518400, function () use ($post) {
                return Category::where('no_id', $post->id)->where('type', 'post')->get();
            });
            cache()->remember('aria.controllers.web.related_posts.id' . $post->id, 518400, function () use ($post) {
                return Post::
                where('type', '=', 'post')
                    ->where(function ($query) {
                        $query->where('publish', 'publish')->orWhere('publish', 'on');
                    })
                    ->where(function ($query) use ($post) {
                        $categories = explode(',', $post->menu_ids);
                        if (count($categories) > 0) {
                            foreach ($categories as $categoryId) {
                                !empty($categoryId) && $query->orWhereRaw("find_in_set($categoryId, menu_ids)");
                            }
                        }
                    })
                    ->where('thumb', '!=', '')
                    ->inRandomOrder()
                    ->limit(4)->get();
            });
            cache()->remember('aria.controllers.web.post.show.post.' . urlencode($post->url), 518400, function () use ($post) {
                return Post::where('slug', urlencode($post->url))
                    ->where('type', 'post')
                    ->where('thumb', '!=', '')
                    ->where(function ($query) {
                        $query->where('publish', 'publish')->orWhere('publish', 'on');
                    })
                    ->first();
            });
            while (!empty($cachedData)) {
                $pageNumber++;
                $this->info(sprintf('%s pageNumber', $pageNumber));
                $this->info(sprintf('%s maxPage', $maxPage));
                if ($pageNumber >= $maxPage) {
                    break;
                }
                $cachedData = cache()->remember('aria.controllers.web.post.blog.posts.' . $post->id, 518400, function () use ($pageNumber, $paginationSize, $post) {
                    $category_blog = cache()->remember('aria.controllers.web.category_blog', 518400, function () {
                        return Menu::where('type', 'post')->orderBy('id', 'ASC')->get();
                    });
                    $posts = Post::where('type', 'post')
                        ->where('thumb', '!=', '')
                        ->where(function ($query) {
                            $query->where('publish', 'publish')->orWhere('publish', 'on');
                        })
                        ->orderBy('created_at', 'DESC')->skip(6)->paginate($paginationSize, ['*'], 'page', $pageNumber);
                    $posts_visit = Post::popularMonth()->where('type', 'post')->where('thumb', '!=', '')->where('publish', 'on')->limit(10)->get();
                    $slideshow = Post::where('type', 'post')->where('thumb', '!=', '')->where('publish', 'on')->orderBy('created_at', 'DESC')->limit(6)->get();
                    $reading = Post::where('type', 'post')->where('thumb', '!=', '')->where(function ($query) {
                        $query->where('publish', 'publish')->orWhere('publish', 'on');
                    })->orderBy('created_at', 'DESC')->limit(15)->get();
                    $users = User::orderBy('id', 'DESC')->get();
                    $categories = explode(',', $post->menu_ids);
                    $relatedProductsQuery = Product::where('publish', '=', 'on')
                        ->where('thumb', '!=', '')
                        ->where(function ($inner_query) use ($categories) {
                            if (count($categories) > 0) {
                                foreach ($categories as $categoryId) {
                                    !empty($categoryId) && $inner_query->orWhereRaw("find_in_set($categoryId, menu_ids)");
                                }
                            }
                        })
                        ->orderBy('id', 'DESC');
                    $relatedProducts = $relatedProductsQuery
                        ->limit(10)
                        ->get();
                    if ($relatedProducts->count() == 0) {
                        $relatedProducts = Product::where('publish', '=', 'on')
                            ->where('thumb', '!=', '')
                            ->take(10)
                            ->inRandomOrder()
                            ->get();
                    }
                    $data = array(
                        'relatedProducts' => $relatedProducts,
                        'category_blog' => $category_blog,
                        'posts' => $posts,
                        'posts_visit' => $posts_visit,
                        'slideshow' => $slideshow,
                        'reading' => $reading,
                        'users' => $users,
                    );
                    return $data;
                });
            }
        }

    }
}
