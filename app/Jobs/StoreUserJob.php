<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data =$data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $password = Str::random(10);
        $this->data['password']=Hash::make($password);
        $user = User::firstOrCreate(['email' => $this->data['email']], $this->data);
        Mail::to($this->data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
    }
}
