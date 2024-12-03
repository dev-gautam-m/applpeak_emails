@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.emailTemplate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.email-templates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.emailTemplate.fields.id') }}
                        </th>
                        <td>
                            {{ $emailTemplate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailTemplate.fields.user') }}
                        </th>
                        <td>
                            {{ $emailTemplate->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailTemplate.fields.subject') }}
                        </th>
                        <td>
                            {{ $emailTemplate->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailTemplate.fields.content') }}
                        </th>
                        <td>
                            {{ $emailTemplate->content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailTemplate.fields.sequence') }}
                        </th>
                        <td>
                            {{ $emailTemplate->sequence }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.email-templates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection