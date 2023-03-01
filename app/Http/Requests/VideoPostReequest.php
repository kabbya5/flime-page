<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoPostReequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [
            "section_id" => 'required|integer',
            'subsection_id' => 'required|integer',
            'post_name' => 'required',
            'post_description' => 'required|min:50|max:800',
            'director' => 'required',
            'producer' => 'required',
            'script_writer' => 'required',
            'cooperation' => 'required',
            'copyright' => 'required',
            'implementation' => 'required',
        ];

        switch($this->method()){
            case 'PATCH':
            case 'PUT':
                $rule['thumbnail'] = '';
                $rule['video_file'] = '';
                $rule['section_id'] = 'integer';
                $rule['subsection_id'] = 'integer';

        }
        return $rule;
    }
    public function messages()
    {
        return  [
            'section_id.required' => 'section name is required!',
            'subsection_id.required' => 'subsection name is required!',
            'post_title.required' => 'post date  is required!',
        ];
    }
}
