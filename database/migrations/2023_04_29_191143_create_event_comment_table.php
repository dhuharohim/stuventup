<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_forms_id')->reference('id')->on('event_forms')->index();
            $table->unsignedBigInteger('profile_id')->reference('id')->on('profile')->index()->nullable();
            $table->unsignedBigInteger('profile_mhs_id')->reference('id')->on('profile_mhs')->index()->nullable();
            $table->unsignedBigInteger('profile_general_id')->reference('id')->on('profile_general')->index()->nullable();
            $table->unsignedBigInteger('user_id')->reference('id')->on('user')->index();
            $table->longText('comment');
            $table->boolean('is_replied', false)->index();
            $table->softDeletes();
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
        Schema::dropIfExists('event_comment');
    }
};
