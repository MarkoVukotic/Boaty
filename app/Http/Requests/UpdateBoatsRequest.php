<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBoatsRequest extends FormRequest
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
            'model' => 'required',
            'production_year' => 'required',
            'capacity' => 'required',
            'blue_cave_private' => 'required',
            'perast_private' => 'required',
            'blue_cave_group' => 'required',
            'price_by_hour' => 'required',
            'departure_time' => 'required',
        ];
    }
}
