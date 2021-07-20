<?php

namespace MaxEckel\WorkflowsStateTrigger\Commands;

use Illuminate\Console\Command;

class WorkflowsStateTriggerCommand extends Command
{
    public $signature = 'workflows-state-trigger';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
