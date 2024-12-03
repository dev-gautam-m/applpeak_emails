@extends('layouts.admin')
@section('content')
 

<div class="card">
    <div class="card-header">
        {{ trans('cruds.contact.title_singular') }}s in {{ $contactGroup->name }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Contact">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.contact.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.contact.fields.email') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $key => $contact)
                        <tr data-entry-id="{{ $contact->id }}">
                            <td>
                                {{ $contact->id ?? '' }}
                            </td>
                            <td>
                                {{ $contact->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $contact->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $contact->email ?? '' }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection