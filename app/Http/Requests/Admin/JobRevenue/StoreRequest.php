<?php

namespace App\Http\Requests\Admin\JobRevenue;

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
            'gel_purchase_cost' => 'required_with_all:gel_selling_cost|numeric|nullable',
            'gel_selling_cost' => 'required_with_all:gel_purchase_cost|numeric|nullable',

            'friction_purchase_cost' => 'required_with_all:friction_selling_cost|numeric|nullable',
            'friction_selling_cost' => 'required_with_all:friction_purchase_cost|numeric|nullable',

            'pop_purchase_cost' => 'required_with_all:pop_selling_cost|numeric|nullable',
            'pop_selling_cost' => 'required_with_all:pop_purchase_cost|numeric|nullable',

            'misc_purchase_cost' => 'required_with_all:misc_selling_cost|numeric|nullable',
            'misc_selling_cost' => 'required_with_all:misc_purchase_cost|numeric|nullable',
        ];
    }
}
