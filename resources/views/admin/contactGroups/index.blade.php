@extends('layouts.admin')
@section('content')
@can('contact_group_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contact-groups.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contactGroup.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contactGroup.title_singular') }} {{ trans('global.list') }}
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ContactGroup">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.contactGroup.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactGroup.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contactGroup.fields.total_emails') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactGroups as $key => $contactGroup)
                        <tr data-entry-id="{{ $contactGroup->id }}">
                            <td>
                                {{ $contactGroup->id ?? '' }}
                            </td>
                            <td>
                                {{ $contactGroup->name ?? '' }}
                            </td>
                            <td>
                                {{ $contactGroup->total_emails ?? '' }}
                            </td>
                            <td>
                                @can('contact_group_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contact-groups.show', $contactGroup->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

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