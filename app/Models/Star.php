<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;
    protected $fillable=['name','system','spectral','size','discovered'];

    public function observations()
    {
        return $this->hasMany(Observation::class);
    }

}
