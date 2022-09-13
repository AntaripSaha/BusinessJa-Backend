<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default(0);
            $table->string('name')->default(0);
            $table->string('image')->default(0);
            $table->string('location_id')->default(0);
            $table->string('phone')->default(0);
            $table->string('mobile')->default(0);
            $table->string('employment_type')->comment('1=full_time,2=part_time,3=intern')->default(0);
            $table->string('job_type')->comment('1=remote,2=on_site')->default(0);
            $table->string('tags')->default(0);
            $table->string('salary')->default(0);
            $table->longText('description')->nullable();
            $table->string('links')->default(0);
            $table->string('posted_by')->default(0);
            $table->string('joining_date')->default(0);
            $table->string('start_date')->comment('application start date')->default(0);
            $table->string('end_date')->comment('application end date')->default(0);
            $table->string('featured')->default(0);
            $table->string('available')->default(0);
            $table->string('accepted')->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
