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
            $table->time('time_start_activity');
            $table->time('time_end_activity')->nullable();
            $table->string('place_activity');
            $table->string('img_activity');
            $table->string('ticket');
            $table->integer('price_ticket')->nullable();
            $table->string('name_pic');
            $table->string('contact_pic');
            $table->enum('type_activity',['seminar','pelatihan','olahraga','pameran','nasional','lainnya']);
            $table->string('other_type')->nullable();
            $table->enum('status_activity', ['akan datang','berlangsung','selesai'])->default('akan datang')->index();
            $table->integer('view_count')->nullable();
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
