<?php

namespace MaxEckel\WorkflowsStateTrigger\Triggers;

use the42coders\Workflows\Fields\DropdownField;
use the42coders\Workflows\Triggers\Trigger;

class StateChangeTrigger extends Trigger
{
    public static $icon = '<i class="fas fa-binoculars"></i>';

    public static $fields = [
        'Class' => 'class',
    ];

    public function inputFields(): array
    {
        $fields = [
            'class' => DropdownField::make(config('workflows.triggers.StateChanges.classes')),
        ];

        return $fields;
    }
}
