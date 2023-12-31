<?php

namespace App\Http\Requests\Akademik;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAkademikRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'nomor_identitas' => [
                'required',
                Rule::unique('table_user', 'nomor_identitas'),
            ],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Password harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'nomor_identitas.required' => 'Nomor Identitas harus diisi.',
            'nomor_identitas.unique' => 'Nomor Identitas sudah ada dalam sistem.',
        ];
    }
}
