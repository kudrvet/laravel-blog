<?php

namespace App\Http\Requests;

use App\Http\Requests\Dto\StoreCommentDto;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'subject' => ['required', 'string'],
            'body'    => ['required', 'string']
        ];
    }

    public function getDto()
    {
        return new StoreCommentDto($this->validated());
    }
}
