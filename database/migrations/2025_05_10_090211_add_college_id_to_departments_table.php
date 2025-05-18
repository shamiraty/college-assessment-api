<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollegeIdToDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedBigInteger('college_id')->nullable()->after('name'); // Add the column
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade'); // Add the foreign key constraint
            $table->index('college_id'); // Optional: Add an index for better performance
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['college_id']); // Drop the foreign key constraint
            $table->dropIndex(['college_id']); // Drop the index
            $table->dropColumn('college_id'); // Drop the column
        });
    }
}