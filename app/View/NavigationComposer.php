<?php
namespace App\View;
use App\Models\Section;
use Illuminate\View\View;

class NavigationComposer{
    public function compose(View $view){
        $sections = Section::with(['subsections' => function ($query){
            $query->orderBy('subsection_position','asc');
        }])->orderBy('section_position','asc')->get(); 

        $view->with('sections',$sections);
    }
}