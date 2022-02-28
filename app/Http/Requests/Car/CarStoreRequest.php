<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            'name' => 'required',
            'title' => 'required',
            'phone' => 'required',
            'city_from_id' => 'required',
            'city_to_id' => 'required',
            'car' => ['nullable'],
            'count' => ['required'],
            'info' => ['nullable'],
            'type' => ['required'],
            'with_people' => ['required'],
            'only_stuff' => ['required'],
            'with_animals' => ['required'],
            'take_from_borders' => ['required'],
        ];
    }
}
