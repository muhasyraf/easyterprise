@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchaseQuotation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-quotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.id') }}
                        </th>
                        <td>
                            {{ $purchaseQuotation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.id_vendor') }}
                        </th>
                        <td>
                            {{ $purchaseQuotation->id_vendor->nama_vendor ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.material_name') }}
                        </th>
                        <td>
                            {{ $purchaseQuotation->material_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.unit_price') }}
                        </th>
                        <td>
                            {{ $purchaseQuotation->unit_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.total_price') }}
                        </th>
                        <td>
                            {{ $purchaseQuotation->total_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.payment_method') }}
                        </th>
                        <td>
                            {{ App\Models\PurchaseQuotation::PAYMENT_METHOD_SELECT[$purchaseQuotation->payment_method] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.status') }}
                        </th>
                        <td>
                            {{ $purchaseQuotation->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.nego_purchase_quotation') }}
                        </th>
                        <td>
                            {{ $purchaseQuotation->nego_purchase_quotation }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-quotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection