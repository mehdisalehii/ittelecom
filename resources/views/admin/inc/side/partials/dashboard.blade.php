@can('admin_panel')
    <li class="section-title list hidden dashboard {{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="extra">
            <i class="icn block white" style="background-image:url('/icons/gauge.svg');"></i>
            داشبورد</a>
    </li>
@endcan