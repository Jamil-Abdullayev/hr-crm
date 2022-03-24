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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
           // $table->bigInteger('developer_id');
            $table->bigInteger('company_id')->nullable();
            $table->decimal('price_max')->nullable();
            $table->decimal('price_min')->nullable();
            $table->decimal('price_per_hour_min')->nullable();
            $table->decimal('price_per_hour_max')->nullable();
            $table->smallInteger('english_level')->nullable();
            $table->smallInteger('exp_max')->nullable();
            $table->smallInteger('exp_min')->nullable();
            $table->smallInteger('age_max')->nullable();
            $table->smallInteger('age_min')->nullable();
            $table->smallInteger('working_type')->nullable();
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
        Schema::dropIfExists('requests');
    }
};
