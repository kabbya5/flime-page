<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Subsection extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $date = ['created_at'];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at ? $this->created_at->format('d/m/y') : '';
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
