<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('provider_id')->default(0);
            $table->string('title')->default(0);
            $table->string('image')->default(0);
            $table->string('address')->default(0);
            $table->string('start_date')->default(0);
            $table->string('start_time')->default(0);
            $table->string('end_date')->default(0);
            $table->string('end_time')->comment('can be recurssive')->default(0);
            $table->string('tags')->default(0);
            $table->longText('description')->default(0);
            $table->boolean('favourite')->default(0);
            $table->boolean('status')->default(0);
            $table->string('price')->default(0);
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
        Schema::dropIfExists('events');
    }
}
