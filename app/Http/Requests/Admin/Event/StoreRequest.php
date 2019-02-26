<?php

namespace App\Http\Requests\Admin\Event;

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
            'job_id' => 'required|integer',
            'time' => 'required|date_format:G:i',
            'wellhead_pressure' => 'required',
            'circulation_pressure' => 'required',
            'discharge_rate' => 'required',
            'additive_id' => 'required|integer',
            'gallons' => 'required|numeric',
            'discharge_total' => 'required',
            'description' => 'required',
        ];
    }
}
