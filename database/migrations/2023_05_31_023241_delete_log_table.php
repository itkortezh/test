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
        Schema::dropIfExists('logs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->string('origin', 200)->nullable();
            $table->enum('type', ['log', 'store', 'change', 'delete']);
            $table->enum('result', ['success', 'neutral', 'failure']);
            $table->enum('level', ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug']);
            $table->string('token', 100)->nullable();
            $table->ipAddress('ip');
            $table->string('user_agent', 200)->nullable();
            $table->string('session', 100)->nullable();
            $table->timestamps();
        });
    }
};
