<?php

namespace App\Http\Requests\Admin\Job;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'contact_name' => 'required',
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'well_name' => 'required',
            'operator' => 'required',
            'lsd' => 'required',
        ];
    }
}
