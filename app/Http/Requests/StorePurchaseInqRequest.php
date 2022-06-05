<?php

namespace App\Http\Requests;

use App\Models\PurchaseInq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchaseInqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_inq_create');
    }

    public function rules()
    {
        return [
            'date_purchase_inquiry' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'material_name' => [
                'string',
                'nullable',
            ],
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
