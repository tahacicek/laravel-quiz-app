<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

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
    protected $fillable=["title", "slug", "status", "descr", "finished_at"];
    protected $dates=["finished_at"];

    public function getFinishedAtAttribute($date){
        return $date ? Carbon::parse($date) : null;
    }
    public function questions(){
        return $this->hasMany("App\Models\Question");
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

}
