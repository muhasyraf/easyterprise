<?php

namespace App\Http\Requests;

use App\Models\SalesQuotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalesQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_quotation_create');
    }

    public function rules()
    {
        return [
            'id_sales_inquiry_id' => [
                'required',
                'integer',
            ],
            'id_customer_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
