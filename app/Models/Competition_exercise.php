<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition_exercise extends Model
{
    use HasFactory;
    protected $table = 'competition_exercises';
    protected $fillable = ['competition_id', 'exercise_id'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
