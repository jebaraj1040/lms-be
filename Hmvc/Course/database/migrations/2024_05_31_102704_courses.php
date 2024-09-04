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
        Schema::create('course_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('page_layout', ['grid', 'list'])->default('grid');
            $table->tinyInteger('course_per_page');
            $table->tinyInteger('course_per_row');
            $table->boolean('enable_course_filter')->comment('1->Yes,0->No');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->integer('department_id');
            $table->integer('category_id');
            $table->string('image')->nullable();
            $table->longText('details')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('video_url');
            $table->enum('course_level', ['easy', 'intermediate', 'difficult'])->default('easy');
            $table->boolean('featured_status')->comment('1->Yes,0->No');
            $table->boolean('published')->comment('1->Yes,0->No');
            $table->boolean('status')->comment('1->Active,0->Inactive');
            $table->integer('duration');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('course_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id');
            $table->integer('course_id');
            $table->integer('user_id');
            $table->decimal('hrs_spent');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('assigned_by');
            $table->smallInteger('status')->comment('1->Assigned, 2->In-Progress, 3->Completed');
            $table->dateTime('certificate_issued_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_settings');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_subscriptions');
    }
};
