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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('course_categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('course_sub_categories')->onDelete('cascade');
            $table->text('course_description');
            $table->text('what_you_will_learn');
            $table->text('certification_description');
            $table->foreignId('instructor_id')->nullable()->constrained('instructors')->onDelete('cascade');
            $table->foreignId('review_id')->nullable()->constrained('course_reviews')->onDelete('cascade');
            $table->string('language');
            $table->string('image');
            $table->foreignId('coupon_id')->nullable()->constrained('coupons');
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
        Schema::dropIfExists('course_details');
    }
};
