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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('cmp_name')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('name')->nullable();
            $table->string('min_edu')->nullable();
            $table->string('phone')->nullable();
            $table->string('job_title')->nullable();
            $table->string('country_name')->nullable();
            $table->string('language')->nullable();
            $table->string('job_type')->nullable();
            $table->string('hiring_no')->nullable();
            $table->string('quickly_need')->nullable();
            $table->string('min')->nullable();
            $table->string('max')->nullable();
            $table->string('rate')->nullable();
            $table->string('job_des')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
