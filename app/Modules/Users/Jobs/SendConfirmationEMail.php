<?php

namespace App\Modules\Users\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendConfirmationEMail implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $row;

    public function __construct($row) {
        $this->row = $row;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        try {
            $row = $this->row;
            \Mail::send('Users::emails.auth.confirm', ['row' => $row], function ($mail) use ($row) {
                $subject = trans('email.Confirmation Code') . " - " . appName();
                $mail->to($row->email , $row->first_name)
                        ->subject($subject);
            });
        } catch (\Throwable $e) {
            \Log::error($e);
        }
    }

}
