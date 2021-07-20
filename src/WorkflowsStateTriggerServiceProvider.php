<?php

namespace MaxEckel\WorkflowsStateTrigger;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use MaxEckel\WorkflowsStateTrigger\Commands\WorkflowsStateTriggerCommand;

class WorkflowsStateTriggerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('workflows-state-trigger')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_workflows-state-trigger_table')
            ->hasCommand(WorkflowsStateTriggerCommand::class);
    }
}
