@if(strpos(URL::current(), 'forum/products') !== false ) 
<div class="menubar-page red scrollbar-horizon" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
    <nav class="nav">
        <div class="menu-link menu-back menu-front">
            <ul class="menu">
                @foreach( $category_forum as $row_main )
                    <li class="-0"><a class="block @if(URL::current()==route('home').'/forum/products/'.$row_main->slug) active @endif" href="forum/products/{{$row_main->slug}}" itemprop="url">{{$row_main->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>
@else
<div class="menubar-page blue-2 scrollbar-horizon">
    <nav class="nav">
        <div class="menu-link menu-back menu-front">
            <ul class="menu">
                @foreach( $category_forum as $row_main )

                    <li class="-0"><a class="block @if(URL::current()==route('home').'/forum/cats/'.$row_main->slug) active @endif" href="forum/cats/{{$row_main->slug}}" itemprop="url">{{$row_main->title}}</a></li>
                @endforeach
                
            </ul>
        </div>
    </nav>
</div>
@endif