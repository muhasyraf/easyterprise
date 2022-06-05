@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.salesReport.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sales-reports.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_laporan">{{ trans('cruds.salesReport.fields.tanggal_laporan') }}</label>
                            <input class="form-control date" type="text" name="tanggal_laporan" id="tanggal_laporan" value="{{ old('tanggal_laporan') }}">
                            @if($errors->has('tanggal_laporan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggal_laporan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesReport.fields.tanggal_laporan_helper') }}</span>
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