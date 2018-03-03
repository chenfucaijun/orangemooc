<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $notice;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\App\Notice $notice)
    {
        Log::debug("--------进入job构造函数--------");
        $this->notice = $notice;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug("--------正在执行handle--------");
        $users = \App\User::all();
        foreach ($users as $user) {
            $user->addNotice($this->notice);
        }
    }
}
