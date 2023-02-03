<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'surname' => 'required|min:2|max:30',
            'name' => 'required|min:5|max:40',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable',
            'document' => 'nullable',
            'doc_series' => 'nullable|max:4',
            'doc_number' => 'nullable',
            'doc_date' => 'nullable|date',
            'doc_issued1' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'notes' => 'nullable',

        ];
    }
}
