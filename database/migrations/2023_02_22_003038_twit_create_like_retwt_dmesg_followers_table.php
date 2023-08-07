<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
    {
        
        // Likes table migration
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tweet_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tweet_id')->references('id')->on('tweets');
        });

        // Retweets table migration
        Schema::create('retweets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('for_tweet_id');
            $table->unsignedBigInteger('this_tweet_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('for_tweet_id')->references('id')->on('tweets');
            $table->foreign('this_tweet_id')->references('id')->on('tweets');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('for_tweet_id');
            $table->unsignedBigInteger('this_tweet_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('for_tweet_id')->references('id')->on('tweets');
            $table->foreign('this_tweet_id')->references('id')->on('tweets');
        });
        

        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('follower_id');
            $table->unsignedBigInteger('following_id');
            $table->timestamps();
            $table->foreign('follower_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('following_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });

        // Direct messages table migration
        Schema::create('direct_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->timestamps();
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
        });

        // Follow requests table migration
        Schema::create('follow_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('follower_id');
            $table->unsignedBigInteger('following_id');
            $table->boolean('accepted')->default(false);
            $table->timestamps();
            $table->foreign('follower_id')->references('id')->on('users');
            $table->foreign('following_id')->references('id')->on('users');
        });
        Schema::create('hashtags', function (Blueprint $table) {
            $table->id();
            $table->string('tag',100);
            $table->timestamps();
        });

        Schema::create('tweet_hashtags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tweet_id');
            $table->unsignedBigInteger('hashtag_id');
            $table->timestamps();

            $table->foreign('tweet_id')
                  ->references('id')
                  ->on('tweets')
                  ->onDelete('cascade');
            $table->foreign('hashtag_id')
                  ->references('id')
                  ->on('hashtags')
                  ->onDelete('cascade');
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('notifiable_id');
            $table->string('notifiable_type');
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->timestamps();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['notifiable_id', 'notifiable_type']);
        });

            Schema::create('mentions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('tweet_id');
                $table->unsignedBigInteger('user_id');
                $table->timestamps();
    
                // Add foreign keys
                $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        
        

        

        
    }

    public function down()
{
    
    Schema::dropIfExists('likes');
    Schema::dropIfExists('retweets');
    Schema::dropIfExists('followers');
    Schema::dropIfExists('direct_messages');
    Schema::dropIfExists('follow_requests');   
    Schema::dropIfExists('comments'); 
    // Schema::table('tweet_hashtags', function (Blueprint $table) {
    //     $table->dropForeign('tweet_hashtags_hashtag_id_foreign');
    //     $table->dropForeign('tweet_hashtags_tweet_id_foreign');
    // });
    Schema::dropIfExists('tweet_hashtags');
    Schema::dropIfExists('hashtags');
    Schema::dropIfExists('notifications');
    Schema::dropIfExists('mentions');
}
};