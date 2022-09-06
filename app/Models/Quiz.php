<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;
use App\Models\Result;

class Quiz extends Model
{
    use Sluggable;
    use HasFactory;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }
    protected $fillable = ["title", "slug", "status", "descr", "quiz_id", "finished_at"];
    protected $dates = ["finished_at"];
    protected $appends = ["details"];

    public function getDetailsAttribute()
    {
        if ($this->results()->count() > 0) {
            # code...
            return [
                "average" => round($this->results()->avg("point")),
                "join_count" => $this->results()->count(),
            ];
        }
        return null;
    }


    public function results()
    {
        return $this->hasMany("App\Models\Result");
    }
    public function my_result()
    {
        return $this->hasOne("App\Models\Result")->where("user_id", auth()->user()->id);
    }
    public function getFinishedAtAttribute($date)
    {
        return $date ? Carbon::parse($date) : null;
    }
    public function questions()
    {
        return $this->hasMany("App\Models\Question");
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
}
