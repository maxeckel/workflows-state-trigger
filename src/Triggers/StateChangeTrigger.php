<?php

namespace MaxEckel\WorkflowsStateTrigger\Triggers;

use the42coders\Workflows\Fields\DropdownField;
use the42coders\Workflows\Triggers\Trigger;

class StateChangeTrigger extends Trigger
{
    public static $icon = '<i class="fas fa-binoculars"></i>';

    public static $fields = [
        'Class' => 'class',
        'From State' => 'states',
        'To State' => 'states',
    ];

    public function inputFields(): array
    {
        $states = collect();

        foreach (config('workflows.triggers.StateChanges.classes') as $key => $value) {
            $states->merge($value['states']);
        }

        $fields = [
            'class' => DropdownField::make(config('workflows.triggers.StateChanges.classes')),
            'states' => DropdownField::make($states->toArray()),
        ];

        return $fields;
    }

    public static function getTranslation(): string
    {
        return "State Change Trigger";
    }
}
