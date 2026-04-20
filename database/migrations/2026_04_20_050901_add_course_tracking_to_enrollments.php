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
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('course_duration')->nullable()->after('service_type');
            $table->date('start_date')->nullable()->after('course_duration');
            $table->date('end_date')->nullable()->after('start_date');
            $table->text('admin_notes')->nullable()->after('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn(['course_duration', 'start_date', 'end_date', 'admin_notes']);
        });
    }
};
