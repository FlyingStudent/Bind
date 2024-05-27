<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEventRequest extends FormRequest
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
        return [  /*
            'user_id' => 'required|integer|exists:users,id',
            'type_id'=>'required|integer|exists:types,id',
            'status_id'=>'required|integer|exists:statuses,id',
            'place_id'=>'required|integer|exists:places,id',
            'name'=>'required|string',
            'parts' =>  ['required','array'],
            'parts.*.id' => 'required',
            'parts.*.number' => [
                'required',
                'numeric',
                'min:1',
            ],
        */];
    }
}
