<?php

namespace MaxEckel\WorkflowsStateTrigger;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MaxEckel\WorkflowsStateTrigger\WorkflowsStateTrigger
 */
class WorkflowsStateTriggerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'workflows-state-trigger';
    }
}
