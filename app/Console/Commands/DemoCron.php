<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TweetRelated\Tweet;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tweet = Tweet::factory()->count(1)->create();

        // echo $tweet; // Output a message to the console
        dump($tweet);
        return Command::SUCCESS;
    }
}
