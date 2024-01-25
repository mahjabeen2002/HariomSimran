<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->string('name');
            $table->integer('max_user');
            $table->integer('max_uses_user');
            $table->decimal('discount_amount', 10, 2);
            $table->decimal('min_amount', 10, 2);
            $table->enum('type', ['percent', 'fixed']);
            $table->enum('status', ['0', '1']);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
