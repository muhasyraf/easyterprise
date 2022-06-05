@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.purchasReq.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchas-reqs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_list_of_material">{{ trans('cruds.purchasReq.fields.id_list_of_material') }}</label>
                <input class="form-control {{ $errors->has('id_list_of_material') ? 'is-invalid' : '' }}" type="number" name="id_list_of_material" id="id_list_of_material" value="{{ old('id_list_of_material', '') }}" step="1">
                @if($errors->has('id_list_of_material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_list_of_material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasReq.fields.id_list_of_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_purchase_requisition">{{ trans('cruds.purchasReq.fields.date_purchase_requisition') }}</label>
                <input class="form-control date {{ $errors->has('date_purchase_requisition') ? 'is-invalid' : '' }}" type="text" name="date_purchase_requisition" id="date_purchase_requisition" value="{{ old('date_purchase_requisition') }}">
                @if($errors->has('date_purchase_requisition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_purchase_requisition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasReq.fields.date_purchase_requisition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_price">{{ trans('cruds.purchasReq.fields.total_price') }}</label>
                <input class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" type="number" name="total_price" id="total_price" value="{{ old('total_price', '') }}" step="0.01">
                @if($errors->has('total_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasReq.fields.total_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.purchasReq.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchasReq.fields.status_helper') }}</span>
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