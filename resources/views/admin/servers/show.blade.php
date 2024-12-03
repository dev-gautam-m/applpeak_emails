@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.server.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.servers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.id') }}
                        </th>
                        <td>
                            {{ $server->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.name') }}
                        </th>
                        <td>
                            {{ $server->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.hostname') }}
                        </th>
                        <td>
                            {{ $server->hostname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.username') }}
                        </th>
                        <td>
                            {{ $server->username }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.port') }}
                        </th>
                        <td>
                            {{ $server->port }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.protocol') }}
                        </th>
                        <td>
                            {{ App\Models\Server::PROTOCOL_SELECT[$server->protocol] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.from_email') }}
                        </th>
                        <td>
                            {{ $server->from_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.from_name') }}
                        </th>
                        <td>
                            {{ $server->from_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $server->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.user') }}
                        </th>
                        <td>
                            {{ $server->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.servers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection