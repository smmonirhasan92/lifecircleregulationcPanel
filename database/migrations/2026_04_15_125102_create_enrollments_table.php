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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('whatsapp_number');
            $table->string('service_type')->index();
            $table->enum('category', ['appointment', 'teacher_training'])->default('appointment')->index();
            $table->text('message')->nullable();
            $table->string('transaction_id')->nullable();
            $table->enum('status', ['pending', 'contacted', 'enrolled', 'completed'])->default('pending')->index();
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
        Schema::dropIfExists('enrollments');
    }
};
