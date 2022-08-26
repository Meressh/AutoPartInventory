<?php

namespace App\Models;

use App\Models\Parts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;

    public function parts(){
        return $this->hasMany(Parts::class);
    }
}
