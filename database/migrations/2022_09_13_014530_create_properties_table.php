<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default(0);
            $table->string('image')->default(0);
            $table->string('location_id')->default(0);
            $table->longText('description')->nullable();
            $table->string('phone')->default(0);
            $table->string('mobile')->default(0);
            $table->string('posted_by')->default(0);
            $table->string('price')->default(0);
            $table->string('status')->comment('1=sale,2=sold,3=rent,4=rented,5=unavailable')->default(0);
            $table->string('properties')->comment('bed,bath,belcony')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
