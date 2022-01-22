<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    protected $fillable=['name','email'];

    public function star()
    {
        return $this->belongsTo(Star::class);
    }

    public function scientist()
    {
        return $this->belongsTo(Scientist::class);
    }
}
