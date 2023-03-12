<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use App\Models\Subsection;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = ['published_at'];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function subsection(){
        return $this->belongsTo(Subsection::class);
    }

    public function  publicationLabel()
    {
        if(!$this->published_at){
            return '<span class="py-1 px-2 rounded-md text-red-500"> Draft </span>';
        }elseif($this->published_at > Carbon::now()){
            return '<span class="py-1 px-2 rounded-md text-orange-400 "> Schedule </span>';
        }else{
            return '<span class="py-1 px-2 rounded-md text-green-600"> Published </span>';
        }
    }

    public function getPublishedDateAttribute(){
        $date = $this->published_at;
        if($date){
            return $date->format('d/m/Y');
        } 
    }

    public function getEditorialNameAttribute(){
        return  explode(',',$this->editorial_associate);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
