<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaInput extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subMediaInput(){
        return $this->hasMany(SubMediaInput::class,'media_input');
    }
}
