<?php

namespace ExportImport\Mypakage;

use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'export-import';
    protected $packageName = 'mypakage';
    protected $commands = [];
    public function boot()
    {
        // Charge les vues à partir du dossier resources/views de votre package
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'ExportImport.Mypakage');

    }
}
