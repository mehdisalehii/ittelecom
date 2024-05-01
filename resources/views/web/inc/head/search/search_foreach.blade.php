@foreach($keyword_menu as $menu)
    <li>
        <a class="block" href="products/cat/{{$menu->slug}}">
            <i class="icn block icon fill" style="background-image:url('/icons/folder.svg');"></i>
            <span><b>دسته‌بندی:</b> {{$menu->title}}</span>
            <i class="icn block arrow fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
        </a>
    </li>
@endforeach

@foreach($keyword_dls_pdf as $dl)
    <li>
        <a target="_blank" class="block" href="dl/catalog/{{$dl->filename}}.pdf">
            <i class="icn block icon fill" style="background-image:url('/icons/file.svg');"></i>
            <span><b>دیتاشیت:</b> {{ $dl->filename }}</span>
            <i class="icn block arrow fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
        </a>
    </li>
@endforeach

@foreach($keyword_datasheets as $dl)
    <li>
        <a target="_blank" class="block" href="dl/catalog/{{$dl->slug}}.pdf">
            <i class="icn block icon fill" style="background-image:url('/icons/file.svg');"></i>
            <span><b>دیتاشیت:</b> {{ $dl->title }}</span>
            <span class="ipsi">پارت نامبر: {{$dl->sku}}</span>
            <i class="icn block arrow fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
        </a>
    </li>
@endforeach

@foreach($keyword_products as $product)
    <li>
        <a class="block" href="/shop/{{$product->slug}}">
            <i class="icn block icon fill" style="background-image:url('/icons/package.svg');"></i>
            <span><b>محصول:</b> {{ \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$product->title)) ,35) }}</span>
            <span class="ipsi">پارت نامبر: {{$product->sku_n}}</span>
            <i class="icn block arrow fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
        </a>
    </li>
@endforeach

@foreach($keyword_posts as $post)
    <li>
        <a class="block" href="/{{$post->slug}}">
            <i class="icn block icon fill" style="background-image:url('/icons/book-open.svg');"></i>
            <span><b>مقاله:</b> {{ \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$post->title)) ,55) }}</span>
            <i class="icn block arrow fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
        </a>
    </li>
@endforeach

@foreach($keyword_topics as $topic)
    <li>
        <a class="block" href="/forum/{{$topic->slug}}">
            <i class="icn block icon fill" style="background-image:url('/icons/twitch.svg');"></i>
            <span><b>تاپیک:</b> {{ \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$topic->title)) ,55) }}</span>
            <i class="icn block arrow fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
        </a>
    </li>
@endforeach

@foreach($keyword_users as $user)
    <li>
        <a class="block" href="/author/{{$user->username}}">
            <i class="icn block icon fill" style="background-image:url('/icons/user.svg');"></i>
            <span><b>نویسنده:</b> {{ $user->name ? $user->name : $user->username }}</span>
            <i class="icn block arrow fill" style="background-image:url('/icons/arrow-up-left.svg');"></i>
        </a>
    </li>
@endforeach