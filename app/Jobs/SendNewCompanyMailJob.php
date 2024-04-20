<?php

namespace App\Jobs;

use App\Http\Api\Modules\Company\Models\Company;
use App\Mail\CompanyCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewCompanyMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $company;
    public $priority = 'high';

    public $tries = 3;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function handle()
    {
        Mail::to($this->company->email)->send(new CompanyCreated($this->company));
    }
}
