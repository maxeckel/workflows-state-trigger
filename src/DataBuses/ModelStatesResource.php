<?php

namespace MaxEckel\WorkflowsStateTrigger\DataBuses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Spatie\ModelStates\HasStates;
use Spatie\ModelStates\StateConfig;
use the42coders\Workflows\DataBuses\DataBus;
use the42coders\Workflows\DataBuses\Resource;

class ModelStatesResource implements Resource
{
    public function getData(string $name, string $value, Model $model, DataBus $dataBus)
    {
        // TODO: Implement getData() method.
    }

    public static function getValues(Model $model, $value, $field_name)
    {
        static::checkTraitIsAvailable($model);

        $classes = [];
        foreach ($model->workflow->triggers as $trigger) {
            if (isset($trigger->data_fields['class']['value'])) {
                $classes[] = $trigger->data_fields['class']['value'];
            }
        }

        $variables = [];
        foreach ($classes as $class) {
            $model = new $class();
            foreach (Schema::getColumnListing($model->getTable()) as $item) {
                $variables[$class.'->'.$item] = $item;
            }
        }

        return $variables;
    }

    public static function loadResourceIntelligence(Model $element, $value, $field_name)
    {
        static::checkTraitIsAvailable($element);

        return collect($element->getStateConfigs())
            ->map(function (StateConfig $stateConfig) {
                return $stateConfig->baseStateClass::getStateMapping()->keys();
            })
            ->toArray();
    }

    public static function checkTraitIsAvailable(Model $model): void
    {
        $reflection = new \ReflectionClass(get_class($model));

        if (! in_array(HasStates::class, $reflection->getTraitNames())) {
            throw new \Exception('Model needs to implement the "HasStates" trait!');
        }
    }
}
