@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.purchaseReturn.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-returns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="purchase_return">{{ trans('cruds.purchaseReturn.fields.purchase_return') }}</label>
                <input class="form-control {{ $errors->has('purchase_return') ? 'is-invalid' : '' }}" type="text" name="purchase_return" id="purchase_return" value="{{ old('purchase_return', '') }}" required>
                @if($errors->has('purchase_return'))
                    <span class="text-danger">{{ $errors->first('purchase_return') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.purchase_return_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_purchase_order_id">{{ trans('cruds.purchaseReturn.fields.id_purchase_order') }}</label>
                <select class="form-control select2 {{ $errors->has('id_purchase_order') ? 'is-invalid' : '' }}" name="id_purchase_order_id" id="id_purchase_order_id" required>
                    @foreach($id_purchase_orders as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_purchase_order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_purchase_order'))
                    <span class="text-danger">{{ $errors->first('id_purchase_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.id_purchase_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.purchaseReturn.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_purchase_return">{{ trans('cruds.purchaseReturn.fields.date_purchase_return') }}</label>
                <input class="form-control date {{ $errors->has('date_purchase_return') ? 'is-invalid' : '' }}" type="text" name="date_purchase_return" id="date_purchase_return" value="{{ old('date_purchase_return') }}">
                @if($errors->has('date_purchase_return'))
                    <span class="text-danger">{{ $errors->first('date_purchase_return') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.date_purchase_return_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.purchaseReturn.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PurchaseReturn::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.status_helper') }}</span>
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