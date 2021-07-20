<?php

namespace MaxEckel\WorkflowsStateTrigger\DataBuses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Spatie\ModelStates\HasStates;
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
        $reflection = new \ReflectionClass(get_class($model));

        if (! in_array(HasStates::class, $reflection->getTraitNames())) {
            throw new \Exception('Model needs to implement the "HasStates" trait!');
        }



        $classes = [];
        foreach ($element->workflow->triggers as $trigger) {
            if (isset($trigger->data_fields['class']['value'])) {
                $classes[] = $trigger->data_fields['class']['value'];
            }
        }

        $variables = [];
        foreach ($classes as $class) {
            $model = new $class;
            foreach (Schema::getColumnListing($model->getTable()) as $item) {
                $variables[$class.'->'.$item] = $item;
            }
        }

        return $variables;
    }

    public static function loadResourceIntelligence(Model $element, $value, $field_name)
    {
        // TODO: Implement loadResourceIntelligence() method.
    }

}