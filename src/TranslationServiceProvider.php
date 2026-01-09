<?php

namespace SanjuInapp\DistributedLaravel;

use Illuminate\Translation\TranslationServiceProvider as BaseTranslationServiceProvider;
use SanjuInapp\DistributedLaravel\Translation\DistributedFileLoader;
use SanjuInapp\DistributedLaravel\Utilties;

class TranslationServiceProvider extends BaseTranslationServiceProvider
{
    /**
     * Register the translation line loader.
     *
     * @return void
     */
    protected function registerLoader()
    {
        $config = $this->app['config']['optimus.components'];

        $paths = Utilities::findNamespaceResources(
            $config['namespaces'],
            $config['language_folder_name'],
            $config['resource_namespace']
        );

        $this->app->singleton('translation.loader', function ($app) use ($paths) {
            return new DistributedFileLoader($app['files'], $paths);
        });
    }
}
