<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Relations
    public function communes()
    {
        return $this->hasMany(Commune::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
