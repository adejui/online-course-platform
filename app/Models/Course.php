<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function courseVideos()
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function courseKeypoints()
    {
        return $this->hasMany(CourseKeypoint::class);
    }

    public function coursePurchases()
    {
        return $this->hasMany(CoursePurchase::class);
    }

    public function courseReviews()
    {
        return $this->hasMany(CourseReview::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
