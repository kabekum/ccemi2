<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecurrenceFieldsToEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->json('days_of_week')->nullable()->after('freq_term');
            $table->unsignedSmallInteger('duration_minutes')->nullable()->after('days_of_week');
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['days_of_week', 'duration_minutes']);
        });
    }
}
