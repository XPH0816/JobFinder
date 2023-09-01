<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $guarded = [];

    protected function salary(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value == "negotiable" ? 'Negotiable' : 'RM ' . $value,
        );
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'applications')->withPivot('status')->withPivot('id')->withTimestamps();
    }

    public function checkApplication()
    {
        return DB::table('applications')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }

    public function favorites()
    {
        return $this->belongsToMany(Job::class, 'favorites', 'job_id', 'user_id')->withTimestamps();
    }

    public function checkSaved()
    {
        return DB::table('favorites')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }
}
