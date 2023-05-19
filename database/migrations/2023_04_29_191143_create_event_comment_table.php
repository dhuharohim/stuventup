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
