@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.server.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.servers.update", [$server->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.server.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $server->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hostname">{{ trans('cruds.server.fields.hostname') }}</label>
                <input class="form-control {{ $errors->has('hostname') ? 'is-invalid' : '' }}" type="text" name="hostname" id="hostname" value="{{ old('hostname', $server->hostname) }}" required>
                @if($errors->has('hostname'))
                    <span class="text-danger">{{ $errors->first('hostname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.hostname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="username">{{ trans('cruds.server.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', $server->username) }}" required>
                @if($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.server.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', $server->password) }}" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="port">{{ trans('cruds.server.fields.port') }}</label>
                <input class="form-control {{ $errors->has('port') ? 'is-invalid' : '' }}" type="number" name="port" id="port" value="{{ old('port', $server->port) }}" step="1">
                @if($errors->has('port'))
                    <span class="text-danger">{{ $errors->first('port') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.port_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.server.fields.protocol') }}</label>
                <select class="form-control {{ $errors->has('protocol') ? 'is-invalid' : '' }}" name="protocol" id="protocol">
                    <option value disabled {{ old('protocol', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Server::PROTOCOL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('protocol', $server->protocol) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('protocol'))
                    <span class="text-danger">{{ $errors->first('protocol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.protocol_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_email">{{ trans('cruds.server.fields.from_email') }}</label>
                <input class="form-control {{ $errors->has('from_email') ? 'is-invalid' : '' }}" type="text" name="from_email" id="from_email" value="{{ old('from_email', $server->from_email) }}" required>
                @if($errors->has('from_email'))
                    <span class="text-danger">{{ $errors->first('from_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.from_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_name">{{ trans('cruds.server.fields.from_name') }}</label>
                <input class="form-control {{ $errors->has('from_name') ? 'is-invalid' : '' }}" type="text" name="from_name" id="from_name" value="{{ old('from_name', $server->from_name) }}" required>
                @if($errors->has('from_name'))
                    <span class="text-danger">{{ $errors->first('from_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.from_name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $server->is_active || old('is_active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.server.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.server.fields.is_active_helper') }}</span>
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