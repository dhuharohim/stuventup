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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_mhs_id')
            ->constrained()
            ->unique()
            ->reference('id')
            ->on('profile_mhs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('event_id')
            ->constrained()
            ->unique()
            ->reference('id')
            ->on('event_forms')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('status_regist', 
            ['telah daftar','terkonfirmasi'])
            ->default('telah daftar')->index();
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
        Schema::dropIfExists('registration');
    }
};
