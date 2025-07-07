<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mentor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function coursePurchases()
    {
        return $this->hasManyThrough(
            CoursePurchase::class,
            Course::class,
            'mentor_id',         // Foreign key on courses table
            'course_id',         // Foreign key on course_purchases table
            'id',                // Local key on mentors table
            'id'                 // Local key on courses table
        );
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
