@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productionMonitoring.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.production-monitorings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="production_plan_id">{{ trans('cruds.productionMonitoring.fields.production_plan') }}</label>
                <select class="form-control select2 {{ $errors->has('production_plan') ? 'is-invalid' : '' }}" name="production_plan_id" id="production_plan_id" required>
                    @foreach($production_plans as $id => $entry)
                        <option value="{{ $id }}" {{ old('production_plan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('production_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('production_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productionMonitoring.fields.production_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.productionMonitoring.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ProductionMonitoring::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productionMonitoring.fields.status_helper') }}</span>
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