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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 100);
            $table->string('status', 20);
            $table->string('sector', 50);
            $table->string('vat_number', 11)->unique();
            $table->string('tax_id_code', 16);
            $table->string('address', 100);
            $table->string('activity_start_date');
            $table->char('rating', 1);
            $table->string('chamber_of_commerce')->nullable();
            $table->text('notes')->nullable();
            $table->string('email', 70)->unique();
            $table->string('phone_number', 20);
            $table->string('username', 50);
            $table->string('password', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
