@extends('layouts.admin')
@section('content')
@can('email_log_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.email-logs.create') }}">
                Schedule Emails
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.emailLog.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-EmailLog">
                <thead>
                    <tr> 
                        <th>
                            {{ trans('cruds.emailLog.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.emailLog.fields.contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.emailLog.fields.template') }}
                        </th>
                        <th>
                            {{ trans('cruds.emailLog.fields.scheduled_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.emailLog.fields.opened_at') }}
                        </th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($emailLogs as $key => $emailLog)
                        <tr data-entry-id="{{ $emailLog->id }}"> 
                            <td>
                                {{ $emailLog->id ?? '' }}
                            </td>
                            <td>
                                {{ $emailLog->contact->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $emailLog->template->subject ?? '' }}
                            </td>
                            <td>
                                {{ $emailLog->scheduled_at ?? '' }}
                            </td>
                            <td>
                                {{ $emailLog->opened_at ?? '' }}
                            </td> 

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
 
@endsection