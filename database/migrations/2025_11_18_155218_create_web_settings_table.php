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
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('company_title')->nullable();
            $table->string('email')->nullable();
            $table->string('email_2')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('favicon_logo')->nullable();
            $table->text('address')->nullable();
            $table->string('advantage_title')->nullable();
            $table->text('advantage_description')->nullable();
            $table->string('feature_1_title')->nullable();
            $table->text('feature_1_desc')->nullable();
            $table->string('feature_2_title')->nullable();
            $table->text('feature_2_desc')->nullable();
            $table->string('advantage_image')->nullable();
            // Trust Metrics (Quick Trims Matrix)
            $table->string('metric_1_title')->nullable();
            $table->string('metric_1_desc')->nullable();
            $table->string('metric_2_title')->nullable();
            $table->string('metric_2_desc')->nullable();
            $table->string('metric_3_title')->nullable();
            $table->string('metric_3_desc')->nullable();
            $table->string('metric_4_title')->nullable();
            $table->string('metric_4_desc')->nullable();

            // Social Links & Google Map
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('messenger')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->text('google_map')->nullable();
            $table->text('header_top_text')->nullable();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('web_settings')->insert([
            'email' => "test@gmail.com",
            'phone' => "+8801310993183",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};
