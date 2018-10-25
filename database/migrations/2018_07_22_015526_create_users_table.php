<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('referral_id')->nullable();
            $table->string('referral_name')->nullable();

            $table->string('name');
            $table->string('facebook_id');
            $table->string('facebook_email');
            $table->string('facebook_access_token');
            $table->string('facebook_refresh_token')->nullable();
            $table->string('facebook_token_expires');

            $table->string('twitch_id')->nullable();
            $table->string('twitch_name')->nullable();
            $table->string('twitch_email')->nullable();
            $table->string('twitch_access_token')->nullable();
            $table->string('twitch_refresh_token')->nullable();
            $table->string('twitch_token_expires')->nullable();

            $table->boolean('twitch_prime_verified')->default(0);
            $table->dateTime('twitch_prime_verified_at')->nullable();
            $table->boolean('twitch_subscription_verified')->default(0);
            $table->boolean('twitch_subscription_verified_at')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
