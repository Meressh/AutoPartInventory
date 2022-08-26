<?php

namespace App\Models;

use App\Models\Cars;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parts extends Model
{
    use HasFactory;

    public function car(){
        return $this->belongsTo(Cars::class);
    }
}
