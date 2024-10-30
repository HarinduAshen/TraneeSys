<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('trainees', function (Blueprint $table) {
        $table->foreignId('duration_id')->constrained()->onDelete('cascade');
        $table->foreignId('university_id')->constrained('uniorinstitutes')->onDelete('cascade');
        $table->foreignId('degree_id')->constrained('degreeorcourses')->onDelete('cascade');
        $table->foreignId('supervisor_id')->constrained()->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('trainees', function (Blueprint $table) {
        $table->dropForeign(['duration_id']);
        $table->dropForeign(['university_id']);
        $table->dropForeign(['degree_id']);
        $table->dropForeign(['supervisor_id']);
    });
}

};
