<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email,' . $this->student->id],
            'birthplace' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:15'], // Adjust max length based on your needs
            'parent' => ['required', 'string', 'max:255'],
            'parentjob' => ['nullable', 'string', 'max:255'], // Make it optional if not always required
            'birthdate' => ['required', 'date'],
            'tes_iq' =>['nullable', 'integer'],
            'tes_masuk' =>['nullable', 'integer'],
            'score_quran' => ['nullable', 'integer'],
            'score_pendapatan' => ['nullable', 'integer'],
            'score_prestasi' => ['nullable', 'integer'],
            'status' => ['nullable', 'string', 'max:20'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'email' => 'email',
            'birthplace' => 'birthplace',
            'address' => 'address',
            'phone' => 'phone',
            'parent' => 'parent name',
            'parentjob' => 'parent job',
            'birthdate' => 'birthdate',
            'tes_iq' => 'tes_iq',
            'tes_masuk' => 'tes_masuk',
            'score_quran' => 'score_quran',
            'score_prestasi' => 'score_prestasi',
            'score_pendapatan' => 'score_pendapatan',
        ];
    }
}