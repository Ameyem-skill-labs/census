<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\TweetRelated\Tweet;
use Carbon\Carbon;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {       
        $schedule->call(function () {
            // Generate a random number between 1 and 10

            $seconds = 10;
            $dt = Carbon::now();
            $x = 60 / $seconds;

            do {
                $rand = rand(1, 10);

                if ($rand > 5) {
                    $tweet = Tweet::factory()->count(1)->create();
                    echo "Tweet generated!\n"; // Output a message to the console
                }

                time_sleep_until($dt->addSeconds($seconds)->timestamp);
            } while ($x-- > 1);
        })->name('generate-tweets')->everyminute();
    }

    

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
