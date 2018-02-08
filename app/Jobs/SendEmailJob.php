<?php

namespace App\Jobs;

use App\Mail\SendEmailMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public $tries = 3; // set limited attempts for pass data into table 'failed_jobs'

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Mail::to('arbimauday@gmail.com')->send(new SendEmailMailable());
        Log::info("Checking Send Email");
    }
}
