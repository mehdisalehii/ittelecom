    <script src="data:text/javascript;base64,{{ base64_encode(
    'var Admin = "'.  mix('/assets/js/admin.js')  .'";' .
    'var AdminStyle = "'. Gate::allows('admin_panel') .'"'
    ) }}"></script>

    <script src="{{ mix('/assets/js/bootstrap.js') }}"></script>
    @can('admin_panel')
    <script src="/tinymce/tinymce.min.js" defer></script>
    @endcan
    <script src="{{ mix('/assets/js/web.js') }}"></script>
@stack('js')
