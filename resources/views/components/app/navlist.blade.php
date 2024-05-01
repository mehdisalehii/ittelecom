<ul class="lists">
    <li class="main first-list"></li>
    @foreach( cache()->remember('aria.menuWhereTypeIsProductAndParentIsZero', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->where('type','=','product')->where('parent','=','0')->get(); }) as $row_main )
        <li class="main menu-nav">
            <a class="bold" href="products/cat/{{$row_main->slug}}" title="{{$row_main->title}}" itemprop="url">
                <i class="icn" style="background-image: url('/assets/menu/{{$row_main->thumb}}')"></i>
                <div class="txt">{{$row_main->title}}</div>
                <div class="arrow"><i class="icn block menu" style="background-image:url('/icons/chevron-left.svg');"></i></div>
            </a>
            <div class="menu-content col-large type-{{$row_main->type}}">
                <div class="boxer-menu col-larg">
                    <div class="part menus">
                        @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_sub )
                            @if ( $row_sub->parent == $row_main->id  && !in_array($row_sub->id, [11,12,55,84]))
                                <div class="ul nav-content col-large  {{--$row_sub->class_name--}} type-{{$row_sub->type}}">
                                    <div class="li">
                                        <a class="extra {{$row_sub->class_name ? $row_sub->class_name : ' '}} type-{{$row_sub->type}}" href="products/cat/{{$row_main->slug}}/{{$row_sub->slug}}" title="{{$row_sub->title}}" itemprop="url">{{$row_sub->title}}
                                            <i class="icn block submenu" style="background-image:url('/icons/chevron-left.svg');"></i>
                                        </a>
                                        {{-- @php $parent_sub = $row_sub->id; @endphp
                                        @foreach( cache()->remember('aria.menuAll', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->get(); }) as $row_child )
                                            @if ( $row_child->parent == $parent_sub )
                                                <a class="{{$row_child->class_name}} type-{{$row_child->type}}" href="products/cat/{{$row_main->slug}}/{{$row_sub->slug}}/{{$row_child->slug}}" title="{{$row_child->title}}" itemprop="url">{{$row_child->title}}</a>
                                            @endif
                                        @endforeach --}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <ul class="part last-products">
                        @php
                            $i = 0; $selected = $row_main->id;
                            $products = cache()->remember('aria.components.app.navlist.products', 518400, function () {
                                return \App\Models\Product::orderBy('id', 'ASC')->where('thumb','!=','')->get();
                            });
                        @endphp
                        @foreach($products as $product)
                            @if (in_array( $selected , explode(',' , $product->menu_ids)))
                                <li>
                                    @foreach( explode(',',$product->thumb) as $thumb => $val)
                                        @if($thumb == 0)
                                            @if ( file_exists(storage_path( 'uploads/picture/product' .'/'. $val .'.jpg' )) )
                                                <img class="thumb wewa" src="/images/uploads/picture/product/{{$val}}.jpg" alt="{{$product->title}}" width=145 height=145>
                                            @else
                                                <img class="thumb wewa" src="/assets/lazy/load.jpg" alt="{{$product->title}}" width=145 height=145>
                                            @endif
                                        @endif
                                    @endforeach
                                </li>
                                @php $i++; @endphp
                                @if($i == 2)
                                    @break
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>
    @endforeach
</ul>
