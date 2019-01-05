<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {

            $table->increments('id');
            $table->text('text');
            $table->text('media')->nullable();
            $table->integer('point')->nullable();

            $table->string('twitter_account_id');
            $table->string('telegram_channel_id');

            $table->bigInteger('tweet_id')->nullable();
            $table->text('tweet_quoted_tweet')->nullable(); // json of quoted
            $table->text('tweet_user')->nullable(); //json including id, user_name, screen_name, verified
            $table->string('tweet_retweet_count')->nullable();
            $table->string('tweet_favorite_count')->nullable();
            $table->string('tweet_is_favorited')->nullable();
            $table->string('tweet_is_retweeted')->nullable();
            $table->dateTime('tweet_created_at')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
