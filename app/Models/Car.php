<?php

namespace App\Models;

use App\Models\Part;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    public function parts(){
        return $this->hasMany(Part::class);
    }
}
