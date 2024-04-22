<?php

namespace App\Console\Commands;

use App\Models\user_side\Employee;
use App\Models\user_side\Employee_personal_information;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BirthdayAlertCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:birthday-alert-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday alerts to employees';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // Aapka code yahaan include karein
        $response = Http::get(route('birthdateChecker')); // Replace 'birthdateChecker' with your route name
        if ($response->successful()) {
            $this->info('Birthdate checker route has been successfully executed.');
        } else {
            $this->error('Failed to execute the birthdate checker route.');
        }
    }
}
