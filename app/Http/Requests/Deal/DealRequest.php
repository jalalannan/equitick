<?php

namespace App\Http\Requests\Deal;

use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Deal' => 'required|numeric',
            'Login' => 'required|numeric',
            'Action' => 'required|numeric',
            'Entry' => 'required|numeric',
            'Time' => 'required|date_format:Y-m-d H:i:s',
            'Symbol' => 'required|max:32',
            'Price' => 'required',
            'Profit' => 'required',
            'Volume' => 'required|numeric',
        ];
    }
}
