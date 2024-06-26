<?php

namespace App\Http\Requests\Place;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'name' => 'required|string',
            'image' => 'required|string',
            'alias' => [
                'required',
                'string',
                Rule::unique('places')->ignore($this->place),
            ],
            'description' => 'required|string',
            'keywords' => 'required|string',
            'email' => 'required|email',
            'zip_code' => 'required|string',
            'address' => 'required|string',
            'number' => 'required|string',
            'complement' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'geo_location' => 'required|string',
            'phone' => 'required|string',
            'whatsapp' => 'required|string',
            'website' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'linkedin' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];
    }
}
