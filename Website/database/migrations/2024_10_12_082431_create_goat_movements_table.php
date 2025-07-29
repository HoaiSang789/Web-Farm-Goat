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
        Schema::create('goat_movements', function (Blueprint $table) {
            $table->id();
            $table->timestamp('moved_at')->nullable(); // Ngày giờ dê di chuyển
            $table->timestamps();

            // Khóa ngoại
            $table->foreignId('goat_id')
                ->constrained('farm_goats', 'goat_id')
                ->onDelete('cascade');

            $table->foreignId('farm_id')
                ->constrained('farms', 'farm_id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goat_movements');
    }
};
