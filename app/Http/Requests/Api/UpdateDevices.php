<?php namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDevices extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
      return $this->bearerToken() === config('auth.api.token');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            '*.ip' => ['required', 'ip'],
            '*.mac' => ['required', 'string'],
            '*.hostname' => ['nullable', 'string'],
        ];
    }
}
