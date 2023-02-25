<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            "section_id" => 'required|integer',
            'subsection_id' => 'required|integer',
            'post_name' => 'required',
            'post_title' => 'required',
            'thumbnail'  => 'required:mimes:jpeg,png,jpg',
            'post_description' => 'required|min:50|max:800',
            'pdf_file' => 'required|mimes:pdf',
            'chief_editor' => 'required',
            'senior_editor' => 'required',
            'editor' => 'required',
            'editorial_associate' => 'required',
        ];
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
