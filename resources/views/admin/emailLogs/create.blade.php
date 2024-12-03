@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.emailLog.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.email-logs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="group_id">Group</label>
                <select class="form-control select2 {{ $errors->has('contact') ? 'is-invalid' : '' }}" name="group_id" id="group_id" required>
                    @foreach($contacts as $id => $entry)
                        <option value="{{ $id }}" {{ old('group_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contact'))
                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emailLog.fields.contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="template_id">{{ trans('cruds.emailLog.fields.template') }}</label>
                <select class="form-control select2 {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template_id" id="template_id" required>
                    @foreach($templates as $id => $entry)
                        <option value="{{ $id }}" {{ old('template_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('template'))
                    <span class="text-danger">{{ $errors->first('template') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emailLog.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="scheduled_at_date">Scheduled Date</label>
                <input class="form-control date {{ $errors->has('scheduled_at_date') ? 'is-invalid' : '' }}" type="text" name="scheduled_at_date" id="scheduled_at_date" value="{{ old('scheduled_at_date') }}">
                @if($errors->has('scheduled_at_date'))
                    <span class="text-danger">{{ $errors->first('scheduled_at_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emailLog.fields.scheduled_at_helper') }}</span>
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