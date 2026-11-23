<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'poster'      => 'nullable|string',
            'slug'        => 'required|string|unique:events,slug' . ($id ? ',' . $id : ''),
            'price'       => 'required|integer|min:0',
            'levels'      => 'required|array|min:1',
            'levels.*'    => 'exists:levels,id',
        ];
    }
}
