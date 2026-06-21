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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            /* Core Identity */
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon_class')->nullable()->default('fa-solid fa-bolt');
            $table->string('phone')->nullable();
            $table->string('whatsApp')->nullable();
            $table->tinyInteger('status')->default(1);

            /* Hero & Main Content */
            $table->string('hero_image')->nullable();
            $table->string('page_title')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();

            /* Dynamic Section Headers */
            $table->string('features_title')->nullable(); // e.g., What's Included
            $table->string('pricing_title')->nullable();  // e.g., Transparent Pricing
            $table->string('gallery_title')->nullable();  // e.g., Work Portfolio
            $table->string('faq_title')->nullable();      // e.g., Frequently Asked Questions

            /* JSON Array Column for FAQs */
            $table->json('faqs')->nullable();

            /* Call To Action (CTA) Block */
            $table->string('cta_title')->nullable();
            $table->text('cta_subtitle')->nullable();

            /* SEO Layer */
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
