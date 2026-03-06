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
        Schema::create('executors_bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('executor_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('price')->nullable();
            $table->string('comment')->nullable();
            $table->date('expected_finish_date');
            $table->enum('status', ['pending', 'accepted', 'declined']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('executors_bids');
    }
};
