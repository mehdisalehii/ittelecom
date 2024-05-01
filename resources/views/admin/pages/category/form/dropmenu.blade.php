<div class="menuable-lists">
    <div class="dd" id="menuable">
        <ol class="dd-list" id="menu-id">
        @foreach ($menus as $menu)
            <li class="dd-item dd3-item" data-id="{{ $menu->id }}">
                @if( URL::current() == route('admin.category.product') )
                    <div class="@can('admin_view'){{'dd-handle'}}@else{{'dd-handle-disable'}}@endcan dd3-handle" title="جابجایی"></div>
                @else
                    <div class="dd-handle-disable dd3-handle" title="جابجایی"></div>
                @endif
                <div class="dd3-content">
                    <span class="img" id="thumb_show_not1">
                        <img class="image" src="/assets/menu/{{ $menu->thumb }}" width="32">
                    </span>
                    <span id="label_show{{ $menu->id }}" class="label">{{ $menu->title }}</span>
                    <span class="span-right">
                        @if( $menu->class_name == 'hide' ){{'(مخفی شده)'}}@endif
                        <button class="btn btn-danger text-white del-button" id="{{ $menu->id }}" title="حذف">
                            <i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>
                        </button>
                        <a class="btn btn-update text-white" target="_blank" href="products/cat/{{ $menu->slug }}" title="پیوند">
                            <i class="icn white" style="background-image: url(/icons/eye.svg);"></i>
                        </a>
                        <button class="btn btn-success edit-button" title="ویرایش" id="{{ $menu->id }}" label="{{ $menu->title }}" slug="{{ $menu->slug }}" thumb="{{ $menu->thumb }}" class_name="{{ $menu->class_name }}" content="{{ $menu->content }}" short_description="{{ $menu->short_description }}" content_bottom="{{ $menu->content_bottom }}" sku="{{ $menu->sku }}" type="{{ $menu->type }}">
                            <i class="icn white" style="background-image: url(/icons/pencil.svg);"></i>
                        </button>
                    </span>
                </div>
                @if($menu->type == 'product' )
                    @if(isset($menu->submenu))
                        <ol class="child" id="menu-id">
                        @foreach ($menu->submenu as $submenu)
                            <li class="dd-item dd3-item" data-id="{{ $submenu->id }}">
                                @if( URL::current() == route('admin.category.product') )
                                    <div class="@can('admin_view'){{'dd-handle'}}@else{{'dd-handle-disable'}}@endcan dd3-handle" title="جابجایی"></div>
                                @else
                                    <div class="dd-handle-disable dd3-handle" title="جابجایی"></div>
                                @endif
                                <div class="dd3-content">
                                    <span id="label_show{{ $submenu->id }}" class="label">{{ $submenu->title }}</span>
                                    <span class="span-right">
                                        @if( $submenu->class_name == 'hide' ) (لینک مخفی شده) @endif
                                        <button class="btn btn-danger text-white del-button" id="{{ $submenu->id }}" title="حذف">
                                            <i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>
                                        </button>
                                        <a class="btn btn-update text-white" target="_blank" href="products/cat/{{ $menu->slug .'/'. $submenu->slug }}" title="پیوند">
                                            <i class="icn white" style="background-image: url(/icons/eye.svg);"></i>
                                        </a>
                                        <button class="btn btn-success edit-button" title="ویرایش" id="{{ $submenu->id }}" label="{{ $submenu->title }}" slug="{{ $submenu->slug }}" thumb="{{ $submenu->thumb }}" class_name="{{ $submenu->class_name }}" content="{{ $submenu->content }}" short_description="{{ $submenu->short_description }}" content_bottom="{{ $submenu->content_bottom }}" sku="{{ $submenu->sku }}" type="{{ $submenu->type }}">
                                            <i class="icn white" style="background-image: url(/icons/pencil.svg);"></i>
                                        </button>
                                    </span>
                                </div>
                            </li>
                        @endforeach
                        </ol>
                    @endif
                @endif
            </li>
        @endforeach
        </ol>
    </div>
</div>
