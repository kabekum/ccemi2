<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $permissions = [
            ['name' => 'read-attendance',   'display_name' => 'Read Attendance',   'description' => 'View attendance sessions and reports'],
            ['name' => 'create-attendance', 'display_name' => 'Create Attendance', 'description' => 'Open attendance sessions and scan member QR codes'],
            ['name' => 'update-attendance', 'display_name' => 'Update Attendance', 'description' => 'Lock/unlock sessions and assign staff to events'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insertOrIgnore($permission);
        }
    }

    public function down(): void
    {
        DB::table('permissions')->whereIn('name', ['read-attendance', 'create-attendance', 'update-attendance'])->delete();
    }
};
