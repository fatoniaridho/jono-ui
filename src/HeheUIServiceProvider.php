<?php

namespace Hehe\UI;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class HeheUIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'hehe');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/hehe'),
        ], 'hehe-views');

        $this->publishes([
            __DIR__.'/../resources/css' => public_path('vendor/hehe'),
        ], 'hehe-assets');

        $this->registerComponents();
    }

    protected function registerComponents(): void
    {
        Blade::componentNamespace('Hehe\\UI\\View\\Components', 'hehe');
    }
}
