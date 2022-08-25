<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
        // return [
        //         'fiche' => 'required',
        //         'etiquette' => 'required|string|unique:reglementations,reference',
        //         'libelle' => 'required|string|unique',
        //         'sousquestion' => 'required|string|unique',
        //         'type' => 'required|string|unique|min:3|max:3"',
        // ];
    }
}
