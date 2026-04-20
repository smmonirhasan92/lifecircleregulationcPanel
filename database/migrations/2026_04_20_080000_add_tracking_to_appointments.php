<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add admin notes column
        if (!Schema::hasColumn('appointments', 'admin_notes')) {
            Schema::table('appointments', function (Blueprint $table) {
                $table->text('admin_notes')->nullable()->after('message');
            });
        }

        // Standardize status values before changing type
        DB::table('appointments')->where('status', 'confirmed')->update(['status' => 'active']);
        DB::table('appointments')->where('status', 'cancelled')->update(['status' => 'canceled']);

        // Change status column type using raw SQL to avoid Doctrine DBAL dependency
        DB::statement("ALTER TABLE appointments MODIFY COLUMN status VARCHAR(255) DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('admin_notes');
            // Reverting column type to enum is risky without DBAL, keeping it as string is safer
        });
    }
};
