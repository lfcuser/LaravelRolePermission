<?php

namespace Lfcuser\LaravelRolePermission\Http\Requests;

use Lfcuser\LaravelRolePermission\Access;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RolePermissionItemRequest extends FormRequest
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
        $permissionsArr = Access::getPermissions();
        $permissionsArr = array_keys($permissionsArr);

        return [
            'permission' => [
                'string',
                'required',
                Rule::in($permissionsArr),
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'errors' => $validator->errors(),
                'status' => true,
            ],
            422
        ));
    }
}
