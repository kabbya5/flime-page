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

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function subsection(){
        return $this->belongsTo(Subsection::class);
    }

    public function getStatusAttribute(){
        $date = $this->publish_at;
        if($date <= Carbon::now()){
            return 'PUBLISHED';
        }elseif(!$date){
            return 'DRIFT';
        }else{
            return "UPCOMMING";
        }
    }

}
