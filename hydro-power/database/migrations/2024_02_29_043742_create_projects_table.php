<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->string('latitude');
            $table->string('longitude');
            $table->longText('summary');
            $table->longText('description');
            $table->longText('impacts');
            $table->longText('advocacies_undertaken');
            $table->longText('rights');
            $table->string('location');
            $table->string('budget');
            $table->string('affected_communities');
            $table->string('conflict_start');
            $table->longText('government_actors');
            $table->longText('advocacy_org');
            $table->longText('relevant_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
