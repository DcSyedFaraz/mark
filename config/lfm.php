<?php

/*
|--------------------------------------------------------------------------
| Documentation for this config :
|--------------------------------------------------------------------------
| online  => http://unisharp.github.io/laravel-filemanager/config
| offline => vendor/unisharp/laravel-filemanager/docs/config.md
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
     */

    'use_package_routes'       => true,

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

    'allow_shared_folder'      => false,

    'shared_folder_name'       => 'shares',

    /*
    |--------------------------------------------------------------------------
    | Folder Names
    |--------------------------------------------------------------------------
     */

    'folder_categories'        => [
        'file'  => [
            'folder_name'  => 'files',
            'startup_view' => 'list',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime'   => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'application/pdf',
                'text/plain',
            ],
        ],
        'image' => [
            'folder_name'  => 'photos',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'valid_mime'   => [
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
            ],
        ],
        'plantInfo'  => [
            'folder_name'  => 'plantInfo',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'water_system'  => [
            'folder_name'  => 'water_system',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data


            ],


        ],
        'general'  => [
            'folder_name'  => 'general',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'abl'  => [
            'folder_name'  => 'abl',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'wtr'  => [
            'folder_name'  => 'wtr',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'br'  => [
            'folder_name'  => 'br',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'bml'  => [
            'folder_name'  => 'bml',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'ci'  => [
            'folder_name'  => 'ci',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'sm'  => [
            'folder_name'  => 'sm',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'ccr'  => [
            'folder_name'  => 'ccr',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
            ],

        ],
        'aoi'  => [
            'folder_name'  => 'aoi',
            'startup_view' => 'grid',
            'max_size'     => 50000, // size in KB
            'thumb' => true,
            'thumb_width' => 80,
            'thumb_height' => 80,
            'create_folder' => true,
            'valid_mime' => [
                // Images
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'image/webp',

                // Documents
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                // Text
                'text/plain',

                // Audio
                'audio/mpeg',
                'audio/ogg',
                'audio/wav',

                // Video
                'video/mp4',
                'video/ogg',
                'video/webm',

                // Archives
                'application/zip',
                'application/x-rar-compressed',
                'application/x-tar',
                'application/gzip',
                'application/x-7z-compressed',

                // Other
                'application/octet-stream', // Binary data
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

    'disk'                     => 'public',

    'rename_file'              => false,

    'rename_duplicates'        => true,

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

    // extensions of executables to prevent from uploading
    'disallowed_extensions' => ['php', 'html'],

    // Item Columns
    'item_columns' => ['name', 'url', 'time', 'icon', 'is_file', 'is_image', 'thumb_url'],

    /*
    |--------------------------------------------------------------------------
    | Thumbnail
    |--------------------------------------------------------------------------
     */

    // If true, image thumbnails would be created during upload
    'should_create_thumbnails' => true,

    'thumb_folder_name'        => 'thumbs',

    // Create thumbnails automatically only for listed types.
    'raster_mimetypes'         => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
    ],

    'thumb_img_width'          => 200, // px

    'thumb_img_height'         => 200, // px

    /*
    |--------------------------------------------------------------------------
    | File Extension Information
    |--------------------------------------------------------------------------
     */

    'file_type_array'          => [
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
    'php_ini_overrides'        => [
        'memory_limit' => '256M',
    ],
];
