<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNextProjectAndPreProjectToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'next_project'))
                $table->foreignId('next_project')->nullable()->references('id')->on('projects')->onDelete('set null');
            if (!Schema::hasColumn('projects', 'previous_project'))
                $table->foreignId('previous_project')->nullable()->references('id')->on('projects')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
