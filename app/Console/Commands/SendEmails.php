<?php

namespace App\Console\Commands;

use App\Http\Controllers\Services\EmailController;
use App\Mail\SendLogsToAdmin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send logs to admin';

    /**
     * @var SendLogsToAdmin
     */
    protected $sender;

    /**
     * SendEmails constructor.
     * @param  EmailController  $sender
     * @return void
     */
    public function __construct(EmailController $sender)
    {
        parent::__construct();
        $this->sender = $sender;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->sender->sendEmail();
    }
}
