<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class ProcessRecurringTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-recurring-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update recurring tasks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('completed', true)->whereNotNull('recurrence')->get();

        foreach ($tasks as $task) {
            $newDoBefore = null;

            switch ($task->recurrence) {
                case 'Ежедневно':
                    $newDoBefore = $task->do_before->addDay();
                    break;
                case 'Еженедельно':
                    $newDoBefore = $task->do_before->addWeek();
                    break;
                case 'Ежемесячно':
                    $newDoBefore = $task->do_before->addMonth();
                    break;
            }

            if (!empty($newDoBefore)) {
                $task->update([
                    'completed' => false,
                    'do_before' => $newDoBefore,
                    ]);
            }
        }

        $this->info('Recurring tasks have been processed');
    }
}
