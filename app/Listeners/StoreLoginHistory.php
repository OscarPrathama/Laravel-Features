<?php

namespace App\Listeners;

use App\Events\UserLoginHistory;
use App\Models\UserLoginHistory as ModelsUserLoginHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserLoginHistory  $event
     * @return void
     */
    public function handle(UserLoginHistory $event)
    {
        $loginTime = Carbon::now()->toDateTimeString();
        $userDetails = $event->user;

        // dd($userDetails);

        $input['name'] = $userDetails->name;
        $input['email'] = $userDetails->email;
        $input['login_time'] = $loginTime;

        $save = ModelsUserLoginHistory::create($input);

        return $save;

    }
}
