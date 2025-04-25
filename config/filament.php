<?php

return [

    'path' => 'admin', 

    /*
    |----------------------------------------------------------------------
    | Broadcasting
    |----------------------------------------------------------------------
    |
    | Uncomment the Laravel Echo configuration to connect Filament to any
    | Pusher-compatible WebSocket server. This enables real-time notifications.
    |
    */

    'broadcasting' => [
        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        //     'forceTLS' => true,
        // ],
    ],

    /*
    |----------------------------------------------------------------------
    | Default Filesystem Disk
    |----------------------------------------------------------------------
    |
    | This defines the storage disk Filament will use to store files. You can
    | choose from any of the disks defined in `config/filesystems.php`.
    |
    | 'public' is typically fine for storing publicly accessible files.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |----------------------------------------------------------------------
    | Assets Path
    |----------------------------------------------------------------------
    |
    | This is the directory where Filament's assets will be published to.
    | It is relative to the `public` directory of your Laravel application.
    |
    | Set this to a custom path if you want to change where assets are stored.
    |
    | After changing the path, don't forget to run `php artisan filament:assets`.
    |
    */

    'assets_path' => 'vendor/filament/assets',

    /*
    |----------------------------------------------------------------------
    | Cache Path
    |----------------------------------------------------------------------
    |
    | This is the directory where Filament will store cache files used to
    | optimize the registration of components.
    |
    | You may leave this as-is unless you want to store cache in another directory.
    |
    | After changing the path, run `php artisan filament:cache-components` to rebuild the cache.
    |
    */

    'cache_path' => base_path('bootstrap/cache/filament'),

    /*
    |----------------------------------------------------------------------
    | Livewire Loading Delay
    |----------------------------------------------------------------------
    |
    | This sets the delay before loading indicators appear in the Filament interface.
    |
    | 'default' applies Livewire's standard 200ms delay, while 'none' shows indicators
    | immediately, which might be useful for high-latency connections.
    |
    | Set this to 'none' or 'default' based on your preference.
    |
    */

    'livewire_loading_delay' => 'default', // or 'none'

    /*
    |----------------------------------------------------------------------
    | System Route Prefix
    |----------------------------------------------------------------------
    |
    | This is the prefix used for system routes that Filament registers, such as
    | routes for downloading exports or handling failed import rows.
    |
    | You can change this if you want to modify the URL structure for Filament routes.
    |
    */

    'system_route_prefix' => 'filament', // Keep this as 'filament' or change it as per your needs.

];
