<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatumRequest extends FormRequest
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
            'Vult' => 'required',
            'Exp' => 'required',
            'Risk' => 'required',
            'Snow' => 'required',
            'MRH' => 'required',
            'URL' => 'required',
            '_P' => 'required',
            '_AA' => 'required',
            '_AH' => 'required',
            '_CH' => 'required',
            '_AT' => 'required',
            '_GT' => 'required',
            'TopCon' => 'required',
            'BotCon' => 'required'
        ];
    }
}
