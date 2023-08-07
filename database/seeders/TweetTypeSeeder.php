<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TweetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [            
            ['id' => 1, 'name' => 'tweet'],
            ['id' => 2, 'name' => 'retweet'],
            ['id' => 3, 'name' => 'responseto'],
            ['id' => 4, 'name' => 'anouncement'],
            ['id' => 5, 'name' => 'meeting'],
            ['id' => 6, 'name' => 'event'],
            ['id' => 7, 'name' => 'poll'],
        ];

        foreach ($items as $item) {
            \App\Models\TweetRelated\Type::create($item);
        }
    }
}
