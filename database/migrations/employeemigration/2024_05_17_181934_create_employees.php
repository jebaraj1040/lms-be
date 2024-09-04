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

        Schema::create('employees', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->nullable();

            $table->string('name');

            $table->string('code');

            $table->string('contact_no');

            $table->string('email');

            $table->string('designation', 100);

            $table->integer('role_id')->comment('linked with roles table')->nullable();

            $table->integer('department_id')->nullable();

            $table->string('skills');

            $table->string('total_experience');

            $table->string('relevant_experience');

            $table->integer('current_ctc');

            $table->integer('expected_ctc');

            $table->string('last_reason_resignation');

            $table->string('location', 100);

            $table->string('notice_period', 100);

            $table->string('image');

            $table->string('cri_past_six_month', 100);

            $table->string('acquaintances_in_cri', 100);

            $table->json('family_backgroud');

            $table->integer('status')->comment('1->Active,0->Inactive');

            $table->integer('created_by');

            $table->integer('updated_by')->nullable();

            $table->integer('deleted_by')->nullable();

            $table->timestamps();

            $table->softDeletes();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('employees');

    }
};
