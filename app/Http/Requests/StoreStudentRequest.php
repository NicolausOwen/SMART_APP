<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['', 'string', 'max:255'],
            "birthplace"=> ['', 'string', 'max:255'],
            "birthdate"=> ['', 'string', 'max:255'],
            "address"=> ['', 'string', 'max:255'],
            "phone"=> ['', 'string', 'max:255'],
            'email' => ['', 'email', 'max:255', 'unique:students,email'],
            "parent"=> ['', 'string', 'max:255'],
            "parentjob"=> ['','string', 'max:255'],
            // 'class_id' => ['', 'exists:classes,id'],
            // 'section_id' => ['', 'exists:sections,id'],
            "user_id"=> ['', 'unique:students', 'user_id']
        ];  
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'birthplace'=>'birthplace',
            'birthdate'=>'birthdate',
            'address'=>'address',
            'phone'=>'phones',
            'email' => 'email',
            'parent'=>'parent',
            'parentjob'=>'parentjob',
            'user_id'=>'user_id',
            // 'class_id' => 'class',
            // 'section_id' => 'section',
        ];
    }
}