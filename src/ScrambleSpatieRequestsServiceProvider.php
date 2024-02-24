<?php

namespace Fp\ScrambleSpatieRequests;

use Fp\ScrambleSpatieRequests\Commands\ScrambleSpatieRequestsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ScrambleSpatieRequestsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('scramble-spatie-requests')
            ->hasConfigFile();
        // ->hasViews()
        // ->hasMigration('create_scramble-spatie-requests_table')
        // ->hasCommand(ScrambleSpatieRequestsCommand::class);
    }
}
