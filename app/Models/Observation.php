<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    protected $fillable=['scientist_id','star_id','cognition','date','new_star'];

    public function star()
    {
        return $this->belongsTo(Star::class);
    }

    public function scientist()
    {
        return $this->belongsTo(Scientist::class);
    }
}
