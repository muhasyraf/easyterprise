<?php

namespace App\Http\Requests;

use App\Models\Akun;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAkunRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('akun_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'nullable',
            ],
            'jenis_akun' => [
                'string',
                'nullable',
            ],
        ];
    }
}
