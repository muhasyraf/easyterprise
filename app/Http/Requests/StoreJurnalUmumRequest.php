<?php

namespace App\Http\Requests;

use App\Models\JurnalUmum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJurnalUmumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jurnal_umum_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nama' => [
                'string',
                'nullable',
            ],
            'total_kredit' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
