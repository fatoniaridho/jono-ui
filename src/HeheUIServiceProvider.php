<?php

namespace Hehe\UI;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class HeheUIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'hehe');

        // Publish views (optional, untuk customization)
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/hehe'),
        ], 'hehe-views');

        // Publish CSS (optional)
        $this->publishes([
            __DIR__.'/../resources/css' => public_path('vendor/hehe'),
        ], 'hehe-assets');

        // Register Blade components
        $this->registerComponents();
    }

    /**
     * Register Blade components with 'hehe' prefix
     */
    protected function registerComponents(): void
    {
        // Anonymous components akan otomatis tersedia dengan prefix 'hehe::'
        // Contoh: <x-hehe::modal />, <x-hehe::card.compact />
        
        Blade::componentNamespace('Hehe\\UI\\View\\Components', 'hehe');
    }
}
