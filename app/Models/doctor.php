<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    protected $table = "doctor";
    public function tohospital()
    {
        return $this->belongsTo(hospital::class, 'hospital');
    }

}
