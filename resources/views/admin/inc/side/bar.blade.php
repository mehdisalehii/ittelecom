<div class="admin-sidebar">
    @include('admin.inc.side.partials.profile')
    <ul class="accordion">
        {{-- @include('admin.inc.side.partials.dashboard') --}}
        @include('admin.inc.side.partials.content')
        @include('admin.inc.side.partials.file')
        @include('admin.inc.side.partials.financial')
        @include('admin.inc.side.partials.organiztion')
    </ul>
    @include('admin.inc.side.partials.logout')
</div>