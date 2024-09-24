<?php

namespace App\Http\Requests\V1\Articles;

use App\Http\Requests\V1\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends ApiRequest
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
            'status' => 'required|in:activate,deactivate',
        ];
    }
}
