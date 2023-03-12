<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use App\Models\User;
use App\Models\Clearence;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getCreateDateAttribute(){
        return $this->created_at->format('d-m-y');
    }

    public function media(){
        return $this->belongsTo(Media::class);
    }

    public function clearence(){
        return $this->belongsTo(Clearence::class);
    }

    public function user_file(){
        return $this->belongsTo(UserFile::class);
    }
}
