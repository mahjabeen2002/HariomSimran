<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('course_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('course_duration');
            $table->decimal('original_price', 8, 2);
            $table->decimal('selling_price', 8, 2);
            $table->text('description');
            $table->string('image');
            $table->enum('level', ['Intermediate', 'Expert', 'Basic']);
            $table->string('status')->default('active');
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
        Schema::dropIfExists('course_sub_categories');
    }
};
