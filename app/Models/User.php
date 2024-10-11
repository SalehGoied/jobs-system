<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'job_number',       // الرقم الوظيفي
        'name_ar',          // الاسم بالعربي
        'name_en',          // الاسم بالانجليزي
        'job_title',        // المسمى الوظيفي
        'department',       // الادارة
        'hire_date',        // تاريخ التعيين
        'phone_number',     // رقم الجوال
        'qualification',    // المؤهل العلمي
        'specialization'    // التخصص
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'hire_date' => 'date',  // Casting hire date to a date type
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

}
