<?php

namespace Zhylon\LaravelCliTools;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Zhylon\LaravelCliTools\Commands\CreateUserCommand;

class LaravelCliToolsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-cli-tools')
            ->hasConfigFile()
            ->hasCommands([
                CreateUserCommand::class
            ]);
    }
}
