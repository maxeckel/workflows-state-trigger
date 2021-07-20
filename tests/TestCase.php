<?php

namespace MaxEckel\WorkflowsStateTrigger\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use MaxEckel\WorkflowsStateTrigger\WorkflowsStateTriggerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'MaxEckel\\WorkflowsStateTrigger\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            WorkflowsStateTriggerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        include_once __DIR__.'/../database/migrations/create_workflows-state-trigger_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
