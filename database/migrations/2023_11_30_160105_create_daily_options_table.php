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
        Schema::create('daily_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('daily_questions')->onDelete('cascade');
            $table->longText('optionA');
            $table->longText('optionB');
            $table->longText('optionC');
            $table->longText('optionD');
            $table->longText('correct_opt');
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
        Schema::dropIfExists('daily_options');
    }
};
