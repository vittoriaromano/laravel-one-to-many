<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
        return [
            'project_name' => 'required|max:50|string',
            'type_id' => 'nullable|exists:types,id',
            'version' => 'required|numeric',
            'description' => 'required|string',
            'start_date' => 'required|required|date',
            'upload_date' => 'required|required|date',
            'value' => 'numeric',
            'completed' => 'boolean',
            'image'=>'nullable|image'
        ];
    }
}