<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->boolean('publish_to_web')->default(true)->after('url');
            $table->boolean('enable_gallery')->default(true)->after('publish_to_web');
            $table->boolean('enable_attendance')->default(false)->after('enable_gallery');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['publish_to_web', 'enable_gallery', 'enable_attendance']);
        });
    }
};
