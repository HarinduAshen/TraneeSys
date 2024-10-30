<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTraineesTable extends Migration
{
    public function up()
    {
        Schema::table('trainees', function (Blueprint $table) {
            $table->unsignedBigInteger('university_id')->nullable();
            $table->foreign('university_id')->references('id')->on('uniorinstitutes');

            $table->unsignedBigInteger('degree_id')->nullable();
            $table->foreign('degree_id')->references('id')->on('degreeorcourses');

            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->foreign('supervisor_id')->references('id')->on('supervisors');

            $table->unsignedBigInteger('division_id')->nullable();
            $table->foreign('division_id')->references('id')->on('divisions');
        });
    }

    public function down()
    {
        Schema::table('trainees', function (Blueprint $table) {
            $table->dropForeign(['university_id']);
            $table->dropColumn('university_id');

            $table->dropForeign(['degree_id']);
            $table->dropColumn('degree_id');

            $table->dropForeign(['supervisor_id']);
            $table->dropColumn('supervisor_id');

            $table->dropForeign(['division_id']);
            $table->dropColumn('division_id');
        });
    }
}
