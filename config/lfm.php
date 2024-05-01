<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    */

    // Include to pre-defined routes from package or not. Middlewares
    'use_package_routes' => false,

    // Middlewares which should be applied to all package routes.
    // For laravel 5.1 and before, remove 'web' from the array.
    'middlewares' => ['web', 'auth'],
    // 'middlewares' => ['web'],

    // The url to this package. Change it if necessary.
    'url_prefix' => 'admin/files',

    /*
    |--------------------------------------------------------------------------
    | Multi-User Mode
    |--------------------------------------------------------------------------
    */

    // If true, private folders will be created for each signed-in user.
    'allow_multi_user' => true,
    // If true, share folder will be created when allow_multi_user is true.
    'allow_share_folder' => true,

    // Flexible way to customize client folders accessibility
    // If you want to customize client folders, publish tag="lfm_handler"
    // Then you can rewrite userField function in App\Handler\ConfigHander class
    // And set 'user_field' to App\Handler\ConfigHander::class
    // Ex: The private folder of user will be named as the user id.
    'user_field' => UniSharp\LaravelFilemanager\Handlers\ConfigHandler::class,



    /*
    |--------------------------------------------------------------------------
    | Shared folder / Private folder
    |--------------------------------------------------------------------------
    |
    | If both options are set to false, then shared folder will be activated.
    |
     */

     'allow_private_folder'     => false,

     // Flexible way to customize client folders accessibility
     // If you want to customize client folders, publish tag="lfm_handler"
     // Then you can rewrite userField function in App\Handler\ConfigHandler class
     // And set 'user_field' to App\Handler\ConfigHandler::class
     // Ex: The private folder of user will be named as the user id.
     'private_folder_name'      => UniSharp\LaravelFilemanager\Handlers\ConfigHandler::class,

    //  'allow_shared_folder'      => false,
    //  'shared_folder_name'       => '',




    /*
    |--------------------------------------------------------------------------
    | Working Directory
    |--------------------------------------------------------------------------
    */

    // Which folder to store files in project, fill in 'public', 'resources', 'storage' and so on.
    // You should create routes to serve images if it is not set to public.
    // 'base_directory' => 'public',
    'base_directory' => 'resources',

    'images_folder_name' => 'uploads/picture',
    // 'files_folder_name'  => 'files',
    // 'shared_folder_name' => 'shares',

    /*
    |--------------------------------------------------------------------------
    | Startup Views
    |--------------------------------------------------------------------------
    */

    // The default display type for items.
    // Supported: "grid", "list"
    'images_startup_view' => 'grid',
    'files_startup_view' => 'list',

    /*
    |--------------------------------------------------------------------------
    | Upload / Validation
    |--------------------------------------------------------------------------
    */

    // If true, the uploaded file will be renamed to uniqid() + file extension.
    'rename_file' => false,

    // If rename_file set to false and this set to true, then non-alphanumeric characters in filename will be replaced.
    'alphanumeric_filename' => false,

    // If true, non-alphanumeric folder name will be rejected.
    'alphanumeric_directory' => false,

    // If true, the uploading file's size will be verified for over than max_image_size/max_file_size.
    'should_validate_size' => false,

    'max_image_size' => 50000,
    'max_file_size' => 50000,

    // If true, the uploading file's mime type will be valid in valid_image_mimetypes/valid_file_mimetypes.
    'should_validate_mime' => false,

    // available since v1.3.0
    'valid_image_mimetypes' => [
        'image/jpeg',
        'image/pjpeg',
        'image/jpg',
        // 'image/png',
        // 'image/gif',
        // 'image/svg+xml',
        // 'image/bmp',
        // 'application/pdf',

    ],

    // If true, image thumbnails would be created during upload
    'should_create_thumbnails' => false,
    'thumb_folder_name'        => 'thumbs',

    // Create thumbnails automatically only for listed types.
    'raster_mimetypes' => [
        'image/jpeg',
        'image/pjpeg',
        'image/jpg',
        'image/png',
        // 'image/bmp',
    ],

    // permissions to be set when create a new folder or when it creates automatically with thumbnails
    'create_folder_mode' => 0755,

    // permissions to be set on file upload.
    'create_file_mode' => 0644,

    // If true, it will attempt to chmod the file after upload
    'should_change_file_mode' => true,

    // available since v1.3.0
    // only when '/laravel-filemanager?type=Files'
    'valid_file_mimetypes' => [
        'image/jpeg',
        'image/pjpeg',
        'image/jpg',
        'image/png',
        // 'image/gif',
        // 'image/svg+xml',
        // 'application/pdf',
        // 'text/plain',
    ],

    /*
    |--------------------------------------------------------------------------
    | Image / Folder Setting
    |--------------------------------------------------------------------------
    */

    'thumb_img_width' => 200,
    'thumb_img_height' => 200,

    /*
    |--------------------------------------------------------------------------
    | File Extension Information
    |--------------------------------------------------------------------------
    */

    'file_type_array' => [
        'pdf'  => 'Adobe Acrobat',
        'doc'  => 'Microsoft Word',
        'docx' => 'Microsoft Word',
        'xls'  => 'Microsoft Excel',
        'xlsx' => 'Microsoft Excel',
        'zip'  => 'Archive',
        'gif'  => 'GIF Image',
        'jpg'  => 'JPEG Image',
        'jpeg' => 'JPEG Image',
        'png'  => 'PNG Image',
        'ppt'  => 'Microsoft PowerPoint',
        'pptx' => 'Microsoft PowerPoint',
    ],

    'file_icon_array' => [
        'pdf'  => 'fa-file-pdf-o',
        'doc'  => 'fa-file-word-o',
        'docx' => 'fa-file-word-o',
        'xls'  => 'fa-file-excel-o',
        'xlsx' => 'fa-file-excel-o',
        'zip'  => 'fa-file-archive-o',
        'gif'  => 'fa-file-image-o',
        'jpg'  => 'fa-file-image-o',
        'jpeg' => 'fa-file-image-o',
        'png'  => 'fa-file-image-o',
        'ppt'  => 'fa-file-powerpoint-o',
        'pptx' => 'fa-file-powerpoint-o',
    ],

    /*
    |--------------------------------------------------------------------------
    | Folder Names
    |--------------------------------------------------------------------------
     */

     'folder_categories'        => [
        'file'  => [
            'folder_name'  => 'catalog',
            'startup_view' => 'list',
            'max_size'     => 50000, // size in KB
            'thumb' => false,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime'   => [
                'image/jpeg',
                'image/jpg',
                'image/png',
                'image/gif',
                'application/pdf',
                'text/plain',
            ],
        ],
        'image' => [
            'folder_name'  => 'images',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime'   => [
                'image/jpeg',
                'image/jpg',
                'image/png',
                'image/gif',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
     */

     'paginator' => [
        'perPage' => 30,
    ],


    /*
    |--------------------------------------------------------------------------
    | Upload / Validation
    |--------------------------------------------------------------------------
     */

     'disk'                     => 'lfm',

     'rename_file'              => false,

     'rename_duplicates'        => false,

     'alphanumeric_filename'    => false,

     'alphanumeric_directory'   => false,

     'should_validate_size'     => false,

     'should_validate_mime'     => true,

     // behavior on files with identical name
     // setting it to true cause old file replace with new one
     // setting it to false show `error-file-exist` error and stop upload
     'over_write_on_duplicate'  => false,

     // mimetypes of executables to prevent from uploading
     'disallowed_mimetypes' => ['text/x-php', 'text/html', 'text/plain'],

     // Item Columns
     'item_columns' => ['name', 'url', 'time', 'icon', 'is_file', 'is_image', 'thumb_url'],

    /*
    |--------------------------------------------------------------------------
    | php.ini override
    |--------------------------------------------------------------------------
    |
    | These values override your php.ini settings before uploading files
    | Set these to false to ingnore and apply your php.ini settings
    |
    | Please note that the 'upload_max_filesize' & 'post_max_size'
    | directives are not supported.
    */
    'php_ini_overrides' => [
        'memory_limit'        => '256M',
    ],

];
