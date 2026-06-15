<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required', 
                'string', 
                'max:255',
                function ($attribute, $value, $fail) {
                    if (str_word_count(trim($value)) < 2) {
                        $fail('Nama lengkap harus terdiri dari minimal 2 kata.');
                    }
                }
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'nik' => ['nullable', 'string', 'digits:16'],
            'no_hp' => ['nullable', 'string', 'regex:/^08[0-9]{8,13}$/'],
            'alamat' => [
                'nullable', 
                'string', 
                function ($attribute, $value, $fail) {
                    if (str_word_count(trim($value)) > 50) {
                        $fail('Alamat domisili maksimal 50 kata.');
                    }
                }
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'no_hp.regex' => 'Format nomor WhatsApp tidak valid. Harus diawali dengan 08 dan berisi 10-15 angka.',
            'nik.digits' => 'NIK harus terdiri dari tepat 16 angka.',
        ];
    }
}
