<?php

namespace App\Console;
// namespace App\Mail\NotifyCustomer;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

// use Carbon\Carbon;
// use DB;
// use Mail\NotifyCustomer;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->everyMinute();

         $schedule->call('\App\Http\Controllers\SubscriptionController@sendNotification')->everyMinute();
         $schedule->call('\App\Http\Controllers\SubscriptionController@notifyQuarter')->everyMinute();
         $schedule->call('\App\Http\Controllers\SubscriptionController@notifyLast')->everyMinute();



        // $schedule->command('send-notification')
        //          ->everyMinute();

                //  $schedule->call(function () {
                 //
                //   //  $todayDate = Carbon::now()->toDateTimeString();
                //    //
                //   //  $reachedHalf = DB::table('subscriptions')->where('half', '=', $todayDate)->get();
                //    //
                //   //  $reachedQuarter = DB::table('subscriptions')->where('quarter', '=', $todayDate)->get();
                //    //
                //   //  $reachedLastDay = DB::table('subscriptions')->where('last', '=', $todayDate)->get();
                 //
                //    Mail::to('example@mail.com')->send(new NotifyCustomer);
                 //
                //  })->everyMinute();

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
