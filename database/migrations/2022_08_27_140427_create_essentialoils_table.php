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
        Schema::create('essentialoils', function (Blueprint $table) {
            $table->id();
            $table->string('name_german')->nullable();
            $table->string('name_latin')->nullable();
            $table->string('name_english')->nullable();
            $table->string('description')->nullable();
            $table->boolean('pur')->default(false);
            $table->boolean('dilute')->default(false);
            $table->boolean('sensitive')->default(false);
            $table->boolean('internal')->default(false);
            $table->foreignId('merchant_id')->default(0);
            $table->foreignId('method_id')->default(0);
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
        Schema::dropIfExists('essentialoils');
    }
};
