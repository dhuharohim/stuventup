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
        Schema::create('event_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')
            ->constrained()
            ->unique()
            ->reference('id')
            ->on('profile')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name_activity');
            $table->string('desc_activity');
            $table->date('date_activity');
            $table->string('img_activity');
            $table->string('ticket')->default('no');
            $table->integer('price_ticket')->nullable();
            $table->string('contact_pic')->nullable();
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
        Schema::dropIfExists('event_forms');
    }
};
