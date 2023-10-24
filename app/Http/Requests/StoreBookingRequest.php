<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'tour' => 'required',
            'departure_time' => 'required',
            'number_of_adults' => 'required',
            'number_of_kids' => 'required',
            'number_of_infants' => 'required',
            'total_price' => 'required',
        ];
    }
}
