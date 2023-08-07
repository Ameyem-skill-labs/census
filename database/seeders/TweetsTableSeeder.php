<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Http\Controllers\Twitt\TweetController;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\TweetRelated\Tweet;
class TweetsTableSeeder extends Seeder
{
    // Create 10 tweets for user with id 1
    public function run()
    {
        $string = "Just finished a #run in the park, feeling great! #fitness #healthylifestyle
        Enjoying a delicious #brunch with friends on this sunny day. #weekendvibes #foodie
        Can't wait to go on my next #vacation and explore new places. #travel #adventure
        Watching the latest #movie at the cinema tonight with my partner. #datenight #entertainment
        Excited to start reading the new #book that just came out. #readinglist #literature
        Having a relaxing evening at home, watching my favorite #tvshow. #NetflixandChill #entertainment
        Taking my #dog for a walk on this beautiful afternoon. #petlovers #nature
        Trying out a new #recipe for dinner tonight, hope it turns out delicious! #cooking #foodie
        Just finished a great #workout at the gym, feeling energized. #fitnessmotivation #healthyliving
        Spending the day at the #beach with friends, soaking up the sun. #summervibes #travel
        Checking out the latest #exhibit at the museum, so much interesting art to see. #culture #artlovers
        Enjoying a refreshing #cocktail on the rooftop bar with a great view of the city. #nightlife #drinks
        Getting ready for a night out with friends, excited to dance the night away. #partytime #fun
        Finally getting around to organizing my #closet, so satisfying when everything is in its place. #organization #homedecor
        Taking a break from work to enjoy a #coffee and relax. #selfcare #mentalhealth
        Just got tickets to see my favorite #band in concert next month, can't wait! #musiclover #liveconcerts
        Trying out a new #yoga class today, excited to see how it goes. #healthylifestyle #wellness
        Spending the afternoon browsing the shops and picking up some new #clothes. #shopping #fashion
        Getting lost in the pages of a great #novel, such a wonderful escape. #booklover #readingtime
        Heading to the gym for a morning #workout, setting the tone for the day. #fitnessjourney #selfimprovement";
        // Create 10 tweets for user with id 1
        $tweets = explode("\n", $string);
        // $tweetController = new TweetController();

        // foreach ($tweets as $tweetstr) {
        //     // $this->line($tweetstr);
        //     $userIds = User::pluck('id');
        //     $usernames = DB::table('users')->pluck('username');
        //     $randomUserId = $userIds->random();
        //     $tweet = new Tweet();
        //     $tweet->message = $tweetstr;
        //     $tweet->user_id = strval($randomUserId) ;
        //     $tweet->type_id = 1 ;
        //     $tweet->save();
        // }
        $userIds = User::pluck('id');
            $usernames = DB::table('users')->pluck('username');
            $randomUserId = $userIds->random();
            $tweet = new Tweet();
            $tweet->message = 'తొగట యాప్ కి స్వాగతం. ఇక్కడ మీరు మీకు నచ్చిన విషయాన్ని పంచుకొనిన, అది అందరికీ కనిపిస్తుంది. అదృష్టం మీ వైపు చూడగలదు.';
            $tweet->user_id = strval($randomUserId) ;
            $tweet->type_id = 1 ;
            $tweet->save();

        // $hashtags = [
        //     '#love',            '#instagood',            '#photooftheday',            '#fashion',            '#beautiful',            '#happy',
        //     '#cute',            '#tbt',            '#like4like',            '#followme',            '#picoftheday',            '#selfie',           
        //      '#summer',            '#friends',            '#fun',            '#food',            '#travel',            '#art',            '#nature',            '#smile'
        // ];

        // foreach ($hashtags as $tag) {
        //     DB::table('hashtags')->insert([
        //         'tag' => $tag,
        //     ]);
        // }



    }

}
