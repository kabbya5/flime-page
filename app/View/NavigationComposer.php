<?php
namespace App\View;
use App\Models\Section;
use App\Models\Setting;
use Illuminate\View\View;

class NavigationComposer{
    public function compose(View $view){
        $this->composeSection($view);
        $this->composeSetting($view);
        
    }

    private function composeSection($view){
        $sections = Section::with(['subsections' => function ($query){
            $query->orderBy('subsection_position','asc');
        }])->orderBy('section_position','asc')->get(); 

        $view->with('sections',$sections);
    }

    private function composeSetting($view){
        $setting = Setting::first();
        $view->with('setting',$setting);
    }
}