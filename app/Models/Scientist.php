<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scientist extends Model
{
    use HasFactory;
    protected $fillable=['name','email'];

    public function observations()
    {
        return $this->hasMany(Observation::class);
    }
}
