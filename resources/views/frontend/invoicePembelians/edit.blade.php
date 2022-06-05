@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.invoicePembelian.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.invoice-pembelians.update", [$invoicePembelian->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nomor">{{ trans('cruds.invoicePembelian.fields.nomor') }}</label>
                            <input class="form-control" type="number" name="nomor" id="nomor" value="{{ old('nomor', $invoicePembelian->nomor) }}" step="1">
                            @if($errors->has('nomor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nomor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoicePembelian.fields.nomor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">{{ trans('cruds.invoicePembelian.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $invoicePembelian->tanggal) }}">
                            @if($errors->has('tanggal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoicePembelian.fields.tanggal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="perusahaan_id">{{ trans('cruds.invoicePembelian.fields.perusahaan') }}</label>
                            <select class="form-control select2" name="perusahaan_id" id="perusahaan_id">
                                @foreach($perusahaans as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('perusahaan_id') ? old('perusahaan_id') : $invoicePembelian->perusahaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('perusahaan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('perusahaan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoicePembelian.fields.perusahaan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="customer_id">{{ trans('cruds.invoicePembelian.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $invoicePembelian->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoicePembelian.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total">{{ trans('cruds.invoicePembelian.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', $invoicePembelian->total) }}" step="0.01">
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoicePembelian.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection