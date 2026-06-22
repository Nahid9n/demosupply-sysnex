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
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_eyebrow')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->text('hero_image')->nullable();

            // Story Section
            $table->text('story_image')->nullable();
            $table->string('story_eyebrow')->nullable();
            $table->string('story_title')->nullable();
            $table->text('story_description_1')->nullable();
            $table->text('story_description_2')->nullable();

            // Features Checklist (Comma separated or json inputs)
            $table->string('story_feature_1')->nullable();
            $table->string('story_feature_2')->nullable();
            $table->string('story_feature_3')->nullable();
            $table->string('story_feature_4')->nullable();

            // Pillars
            $table->text('vision_text')->nullable();
            $table->text('mission_text')->nullable();

            // Metrics / Counters
            $table->string('metric_count_1')->nullable();
            $table->string('metric_title_1')->nullable();
            $table->string('metric_count_2')->nullable();
            $table->string('metric_title_2')->nullable();
            $table->string('metric_count_3')->nullable();
            $table->string('metric_title_3')->nullable();
            $table->string('metric_count_4')->nullable();
            $table->string('metric_title_4')->nullable();

            // Values Area
            $table->string('value_title_1')->nullable();
            $table->text('value_desc_1')->nullable();
            $table->string('value_title_2')->nullable();
            $table->text('value_desc_2')->nullable();
            $table->string('value_title_3')->nullable();
            $table->text('value_desc_3')->nullable();

            // CTA Area
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_settings');
    }
};
