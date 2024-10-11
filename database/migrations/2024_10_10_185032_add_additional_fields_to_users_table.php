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
        Schema::table('users', function (Blueprint $table) {
            $table->string('job_number')->nullable();        // الرقم الوظيفي
            $table->string('name_ar')->nullable();           // الاسم بالعربي
            $table->string('name_en')->nullable();           // الاسم بالانجليزي
            $table->string('job_title')->nullable();         // المسمى الوظيفي
            $table->string('department')->nullable();        // الادارة
            $table->date('hire_date')->nullable();           // تاريخ التعيين
            $table->string('phone_number')->nullable();      // رقم الجوال
            $table->string('qualification')->nullable();     // المؤهل العلمي
            $table->string('specialization')->nullable();    // التخصص
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'job_number',
                'name_ar',
                'name_en',
                'job_title',
                'department',
                'hire_date',
                'phone_number',
                'qualification',
                'specialization'
            ]);
        });
    }
};
