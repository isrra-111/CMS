<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class GravatarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
               // Register the Gravatar alias manually
        AliasLoader::getInstance()->alias('Gravatar', \Creativeorange\Gravatar\Facades\Gravatar::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
