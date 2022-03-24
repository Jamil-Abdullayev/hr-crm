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
            $table->string('phone')->nullable();
            $table->text('messenger')->nullable();
            $table->string('email')->nullable();
            $table->text('social_media')->nullable();
            $table->text('location')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('price_per_hour')->nullable();
            $table->smallInteger('english_level')->nullable();//1-low,2-medium,3-expert
            $table->smallInteger('age')->nullable();
            $table->smallInteger('experience')->nullable();
            $table->smallInteger('working_type')->nullable();//full time 1, part-time 2
            $table->text('developer_image')->nullable();
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
