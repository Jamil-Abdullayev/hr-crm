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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->index('name');//index
            $table->string('phone');
            $table->text('messenger');
            $table->string('email');
            $table->text('social_media');
            $table->text('location');
            $table->decimal('price');
            $table->smallInteger('working_type');//full time 1, part-time 2
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
        Schema::dropIfExists('developers');
    }
};
