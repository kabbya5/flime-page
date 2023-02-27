<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMediaInput extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mediaInput(){
        return $this->belongsTo(MediaInput::class);
    }
}
