<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'start_time', 'end_time'];

    // Relations
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'competition_exercises');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'competition_participants')->withPivot('score', 'rank');
    }
}
