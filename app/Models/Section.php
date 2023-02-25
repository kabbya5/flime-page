<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $date = ['created_at'];

    public function subsections(){
        return $this->hasMany(Subsection::class);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->format('d/m/y');
    }


    public function getRouteKeyName()
    {
        return 'section_slug';
    }
}
