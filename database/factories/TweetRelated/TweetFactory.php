<?php
namespace Database\Factories\TweetRelated;
use App\Models\TweetRelated\Hashtag;
use App\Models\TweetRelated\Tweet;
use App\Http\Controllers\Twitt\TweetController;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Inspiring;
use App\User;

class TweetFactory extends Factory
{ 
    protected $model = Tweet::class;
    public function definition()
    {
        // $faker = Faker::create();
        // $sentence = $this->faker->sentence(10); // Generates a random sentence
        $usernames = User::pluck('username');
        // $mytweet=Inspiring::quote();
        // $randomUserId = $userIds->random();
        $randomUsername = $usernames->random();

        $tweet1=Inspiring::quote();

        $tags = Hashtag::all()->pluck('tag');
        $randomTag = $tags->random();
        // $this.line($randomTag);

        return [
            'message' => $tweet1.' #'.$randomTag.' @'.$randomUsername,
            'user_id' => rand(1, 12),
        ];
    }
}


// $userId = DB::table('users')->pluck('id')->inRandomOrder()->first();
// $username = DB::table('users')->pluck('username')->inRandomOrder()->first();