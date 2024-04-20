<?php

namespace App\Console\Commands;

use App\Http\Api\Modules\Employee\Models\Employee;
use Illuminate\Console\Command;

class CheckInternedEmployee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:check-interned-employee';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change employee status if passed intern period.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $internPeriod = now()->subDays(Employee::INTERN_PERIOD);

        $employees = Employee::select('id', 'start_at')->where('created_at','>',($internPeriod->subDays(5)))->get();
        $passedEmployeeIds = $employees->where('started_at', '>', $internPeriod)->pluck('id');
            Employee::whereIn('id',$passedEmployeeIds)
                ->update(['is_intern' => true]);

        $this->info('Interned Employee have been synced successfully!');
        return Command::SUCCESS;
    }
}
