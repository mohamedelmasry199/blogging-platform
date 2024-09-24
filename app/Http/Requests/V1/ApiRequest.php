<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    abstract public function authorize();

    abstract public function rules();

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        $errors = (new ValidationException($validator))->errors();

        $transformedErrors = array_map(function($message, $field) {
            return [$field => $message[0]];
        }, $errors, array_keys($errors));

        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'errors' => $transformedErrors
            ], JsonResponse::HTTP_BAD_REQUEST)
        );
    }
}
