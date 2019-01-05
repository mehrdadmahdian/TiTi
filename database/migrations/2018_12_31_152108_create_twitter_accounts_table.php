<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitter_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('application_oauth_access_token')->nullable();
            $table->string('application_oauth_access_token_secret')->nullable();
            $table->string('application_consumer_key')->nullable();
            $table->string('application_consumer_secret')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->integer('active')->nullable()->dafault(0);

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
        Schema::dropIfExists('twitter_accounts');
    }
}
