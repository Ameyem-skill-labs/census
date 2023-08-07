<?php

use Illuminate\Foundation\Inspiring;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\SeedController;
use App\Http\Controllers\Twitt\TweetController;
use App\User;
use App\Models\TweetRelated\Tweet;
use App\Models\TweetRelated\Hashtag;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('home', function () {
    $this->comment(PeopleController::class);
});
Artisan::command('create:users', function () {
    // $seedController = new SeedController();
    // $seedController->createusers();
    $this->line("User ID: Name:  Username: ");
    $users = User::factory()->count(10)->create();
    foreach ($users as $user) {
        $this->line("{$user->id} | {$user->name} |{$user->username}");
    }
})->describe('Description of my command');

Artisan::command('tweet', function () {
    $tweetController = new TweetController();
    // $this->comment('This this');
    dump($tweetController->index());
})->describe('Description of my command');

Artisan::command('create:tweet', function () {  


    $tweet = Tweet::factory()->count(1)->create();

    $this->line(response()->json($tweet));
})->describe('Description of my command');

Artisan::command('create:tweetper5sec', function () {
    // This command creates a tweet every 5 seconds, if a random number is greater than 5

    $seconds = 15;
    $dt = Carbon::now();

    for ($i = 0; $i < 12; $i++) {
        $rand = rand(1, 10);
        if ($rand > 5) {
            try {
                $tweet = Tweet::factory()->count(1)->create();
                $this->line(response()->json($tweet));
            } catch (Exception $e) {
                $this->error('Failed to create tweet: ' . $e->getMessage());
            }
        }
        time_sleep_until($dt->addSeconds($seconds)->timestamp);
    }
})->describe('Creates a tweet every 5 seconds, if a random number is greater than 5.');

// $userIds = DB::table('users')->pluck('id');
// $usernames = DB::table('users')->pluck('username');
    // $tweetController = new TweetController();
    // $mytweet=Inspiring::quote();
    // $randomUserId = $userIds->random();
    // $tweet = new Tweet();
    // $tweet->content = $mytweet;
    // $tweet->user_id = $randomUserId ;
    // $response = $tweetController->saveTweet($tweet);
    // $this->comment($response);


Artisan::command('get:users', function () {
    $users = User::all();
    $this->line("User ID: Name:  Username: ");
    foreach ($users as $user) {
        $this->line("{$user->id} | {$user->name} |{$user->username}");
    }
})->describe('Get the list of all users from the users table.');