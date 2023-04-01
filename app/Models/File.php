<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use App\Models\User;
use App\Models\Clearence;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at','deleted_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function file_delete_user(){
        return $this->belongsTo(User::class,'user_file_delete_id');
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

    public function getDeletedDateAttribute(){
        return $this->deleted_at->format('d-m-Y');
    }

    public function user_file(){
        return $this->belongsTo(UserFile::class);
    }
}
