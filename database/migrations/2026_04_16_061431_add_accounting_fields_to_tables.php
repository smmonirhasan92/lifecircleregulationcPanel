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
        Schema::table('appointments', function (Blueprint $table) {
            $table->decimal('payment_amount', 10, 2)->nullable()->after('status');
            $table->boolean('is_paid')->default(false)->after('payment_amount');
        });

        Schema::table('enrollments', function (Blueprint $table) {
            $table->decimal('payment_amount', 10, 2)->nullable()->after('status');
            $table->boolean('is_paid')->default(false)->after('payment_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['payment_amount', 'is_paid']);
        });

        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn(['payment_amount', 'is_paid']);
        });
    }
};
