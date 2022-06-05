@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salesOrder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales-orders.update", [$salesOrder->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.salesOrder.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $salesOrder->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesOrder.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sales_quotation_id">{{ trans('cruds.salesOrder.fields.sales_quotation') }}</label>
                <select class="form-control select2 {{ $errors->has('sales_quotation') ? 'is-invalid' : '' }}" name="sales_quotation_id" id="sales_quotation_id" required>
                    @foreach($sales_quotations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sales_quotation_id') ? old('sales_quotation_id') : $salesOrder->sales_quotation->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sales_quotation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sales_quotation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesOrder.fields.sales_quotation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.salesOrder.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $salesOrder->qty) }}" step="1">
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesOrder.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.salesOrder.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SalesOrder::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $salesOrder->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesOrder.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="detail_order">{{ trans('cruds.salesOrder.fields.detail_order') }}</label>
                <input class="form-control {{ $errors->has('detail_order') ? 'is-invalid' : '' }}" type="text" name="detail_order" id="detail_order" value="{{ old('detail_order', $salesOrder->detail_order) }}">
                @if($errors->has('detail_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detail_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesOrder.fields.detail_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.salesOrder.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $salesOrder->tanggal) }}">
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesOrder.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.salesOrder.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $salesOrder->total) }}" step="0.01">
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesOrder.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection