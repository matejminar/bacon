<?php namespace App\Http\Requests\Admin\Device;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDevice extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.device.edit', $this->device);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'ip' => ['sometimes', 'string'],
            'mac' => ['sometimes', 'string'],
            'hostname' => ['nullable', 'string'],
            'employee_id' => ['nullable', 'integer'],
            
        ];
    }
}
