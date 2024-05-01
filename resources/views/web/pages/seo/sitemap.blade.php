{!! '<?xml version="1.0" encoding="utf-8" ?>' !!}
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">
    <url>
        <loc>{{ url("/") }}</loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url('/blog') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @foreach($menu_posts as $menu_post)
        <url>
            <loc>{{ url(sprintf('/category/article/%s', $menu_post->slug)) }}</loc>
            <changefreq>weekly</changefreq>
            <lastmod>{{ \Carbon\Carbon::parse($menu_post->updated_at)->toDateString() }}</lastmod>
            <priority>1</priority>
        </url>
        @foreach($all_menu_records as $menu_record)
            @if($menu_record->parent == $menu_post->id)
                <url>
                    <loc>{{ url(sprintf('/category/article/%s/%s', $menu_post->slug, $menu_record->slug)) }}</loc>
                    <changefreq>weekly</changefreq>
                    <priority>0.9</priority>
                </url>
                @foreach($all_menu_records as $row_child)
                    @if($row_child->parent == $menu_record->id)
                        <url>
                            <loc>{{ url(sprintf('/category/article/%s/%s/%s',$menu_post->slug, $menu_record->slug, $row_child->slug)) }}</loc>
                            <changefreq>weekly</changefreq>
                            <priority>0.9</priority>
                        </url>
                    @endif
                @endforeach
            @endif
        @endforeach
    @endforeach
    @foreach($posts as $post)
        <url>
            <loc>{{ url(sprintf('/blog/%s/amp', $post->slug)) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($post->updated_at)->toDateString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach($posts as $post)
        <url>
            <loc>{{ url(sprintf('/blog/%s', $post->slug)) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($post->updated_at)->toDateString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    <url>
        <loc>{{ url('/shop') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @foreach($menu_products as $menu_product)
        <url>
            <loc>{{ url(sprintf('/products/cat/%s', $menu_product->slug)) }}</loc>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
        @foreach($all_menu_records as $row_sub)
            @if($row_sub->parent == $menu_product->id)
                <url>
                    <loc>{{ url(sprintf('/products/cat/%s/%s', $menu_product->slug, $row_sub->slug)) }}</loc>
                    <changefreq>weekly</changefreq>
                    <lastmod>{{ \Carbon\Carbon::parse($row_sub->updated_at)->toDateString() }}</lastmod>
                    <priority>0.5</priority>
                </url>
                @foreach($all_menu_records as $row_child)
                    @if($row_child->parent == $row_sub->id)
                        <url>
                            <loc>{{ url(sprintf('/products/cat/%s/%s/%s', $menu_product->slug, $row_sub->slug, $row_child->slug)) }}</loc>
                            <changefreq>weekly</changefreq>
                            <lastmod>{{ \Carbon\Carbon::parse($row_sub->updated_at)->toDateString() }}</lastmod>
                            <priority>0.4</priority>
                        </url>
                    @endif
                @endforeach
            @endif
        @endforeach
    @endforeach

    @foreach($products as $row)
        <url>
            <loc>{{ url(sprintf('/shop/%s', $row->slug)) }}</loc>
            <changefreq>weekly</changefreq>
            <priority>0.3</priority>
        </url>
    @endforeach
    <url>
        <loc>{{ url('/forum') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.2</priority>
    </url>
    @foreach($menu_forums as $menu_forum)
        <url>
            <loc>{{ url(sprintf('/forum/cats/%s', $menu_forum->slug)) }}</loc>
            <changefreq>weekly</changefreq>
            <lastmod>{{ \Carbon\Carbon::parse($menu_forum->updated_at)->toDateString() }}</lastmod>
            <priority>0.1</priority>
        </url>
        <url>
            <loc>{{ url(sprintf('/forum/products/%s', $menu_forum->slug)) }}</loc>
            <changefreq>weekly</changefreq>
            <lastmod>{{ \Carbon\Carbon::parse($menu_forum->updated_at)->toDateString() }}</lastmod>
            <priority>0.1</priority>
        </url>
    @endforeach

    @foreach($forums as $forum)
        <url>
            <loc>{{ url(sprintf('/forum/%s', $forum->slug)) }}</loc>
            <lastmod>{{ \Carbon\Carbon::parse($forum->updated_at)->toDateString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.1</priority>
        </url>
    @endforeach

    @foreach($tags as $tag)
        @if(!empty($tag->name))
        <url>
            <loc>{{ url(sprintf('/tags/%s', $tag->name)) }}</loc>
            <changefreq>weekly</changefreq>
            <priority>0.1</priority>
        </url>
       @endif
    @endforeach
</urlset>
