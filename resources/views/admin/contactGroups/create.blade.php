@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contactGroup.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contact-groups.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.contactGroup.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactGroup.fields.name_helper') }}</span>
            </div> 
            <div class="form-group">
                <label for="csv_file">Contacts</label>
                <input class="form-control {{ $errors->has('csv_file') ? 'is-invalid' : '' }}" type="file" name="csv_file" id="csv_file" required>
                @if($errors->has('csv_file'))
                    <span class="text-danger">{{ $errors->first('csv_file') }}</span>
                @endif
                <span class="help-block">Upload CSV file for contacts</span>
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