<?php

namespace Avart\Forms;

use Illuminate\Foundation\Http\FormRequest;

class TableStoreRequest extends FormRequest
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
            'name' => 'required|unique:tables|max:255',
            'route' => 'required|unique:tables|max:255',
            'model' => 'required|unique:tables|max:255',
        ];
    }
}
