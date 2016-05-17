<?php
namespace Rocketeer\Plugins\Telegram;

use Illuminate\Support\ServiceProvider;
use Rocketeer\Facades\Rocketeer;

/**
 * Register the Telegram plugin with the Laravel framework and Rocketeer
 */
class RocketeerTelegramServiceProvider extends ServiceProvider
{

    /**
     * Register classes
     *
     * @return void
     */
    public function register()
    {
        // ...
    }

    /**
     * Boot the plugin
     *
     * @return void
     */
    public function boot()
    {
        Rocketeer::plugin('Rocketeer\Plugins\Telegram\RocketeerTelegram');
    }
}
