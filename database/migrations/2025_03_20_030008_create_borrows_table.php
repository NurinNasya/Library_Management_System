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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bookid')->constrained('books')->onDelete('cascade'); // References books table
            $table->string('borrower_name'); // Stores borrower's name
            $table->date('borrower_date')->default(now()); // Borrow date
            $table->date('return_date')->nullable(); // Return date (null if not returned yet)
            $table->string('status')->default('Available'); // Default status is Available
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
