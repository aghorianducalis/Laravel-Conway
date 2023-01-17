<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $generation
 * @property array $cell_states
 */
class ConwayCreateRequest extends FormRequest
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
            'generation'                => 'required|int',
            'cell_states'               => 'required|array',
            'cell_states.*'             => 'array',
            'cell_states.*.cell_id'     => 'required|int',
            'cell_states.*.state_id'    => 'required|int',
            'cell_states.*.generation'  => 'required|int',
        ];
    }
}
