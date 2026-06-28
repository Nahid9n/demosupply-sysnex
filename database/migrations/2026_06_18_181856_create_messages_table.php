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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // First Name + Last Name একসাথে সেভ হবে
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('interest')->nullable();

            // নতুন যুক্ত হওয়া ফিল্ডসমূহ
            $table->string('zip_code')->nullable();
            $table->string('street_address')->nullable();
            $table->string('apartment')->nullable();
            $table->string('frequency')->nullable();
            $table->boolean('sms_opt_in')->default(0); // ১ হলে ট্রু, ০ হলে ফলস

            $table->text('message')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
