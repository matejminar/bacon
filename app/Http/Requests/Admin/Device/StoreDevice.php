<?php namespace App\Http\Requests\Admin\Device;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDevice extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.device.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'ip' => ['required', 'string'],
            'mac' => ['required', 'string'],
            'hostname' => ['nullable', 'string'],
            'employee_id' => ['nullable', 'integer'],
            
        ];
    }
}
