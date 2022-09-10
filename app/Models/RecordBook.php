<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeAttestation;
class RecordBook extends Model
{
    use HasFactory;

    function type(){
        return $this->hasMany(TypeAttestation::class);
    }
}
