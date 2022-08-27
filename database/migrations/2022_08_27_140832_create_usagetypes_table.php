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
        Schema::create('usagetypes', function (Blueprint $table) {
            $table->id();
            $table->boolean('pur')->default(false);
            $table->boolean('sensitive')->default(false);
            $table->boolean('dilute')->default(false);
            $table->boolean('internal')->default(false);
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
        Schema::dropIfExists('usagetypes');
    }
};
