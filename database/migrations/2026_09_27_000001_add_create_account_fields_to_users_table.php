<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'first_name')) {
                $table->string('first_name')->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'middle_name')) {
                $table->string('middle_name')->nullable()->after('first_name');
            }
            if (!Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name')->nullable()->after('middle_name');
            }
            if (!Schema::hasColumn('users', 'account_type')) {
                $table->string('account_type', 50)->nullable()->after('role');
            }
            if (!Schema::hasColumn('users', 'address_line_1')) {
                $table->string('address_line_1')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'state_province_region')) {
                $table->string('state_province_region')->nullable()->after('address_line_1');
            }
            if (!Schema::hasColumn('users', 'city_municipality')) {
                $table->string('city_municipality')->nullable()->after('state_province_region');
            }
            if (!Schema::hasColumn('users', 'district_local_area')) {
                $table->string('district_local_area')->nullable()->after('city_municipality');
            }
            if (!Schema::hasColumn('users', 'postal_zip_code')) {
                $table->string('postal_zip_code', 50)->nullable()->after('district_local_area');
            }
            if (!Schema::hasColumn('users', 'valid_id_type')) {
                $table->string('valid_id_type', 100)->nullable()->after('valid_id_number');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'first_name',
                'middle_name',
                'last_name',
                'account_type',
                'address_line_1',
                'state_province_region',
                'city_municipality',
                'district_local_area',
                'postal_zip_code',
                'valid_id_type',
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
