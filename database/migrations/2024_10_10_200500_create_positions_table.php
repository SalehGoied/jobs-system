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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // المسمى الوظيفي
            $table->string('department'); // الإدارة
            $table->string('job_reference'); // المرجع الوظيفي
            $table->text('description'); // وصف الوظيفة
            $table->text('responsibilities'); // مسؤوليات ومهام الوظيفة
            $table->text('educational_qualifications'); // المؤهل التعليمي – الدورات والشهادات
            $table->text('work_experience'); // الخبرة العملية
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
