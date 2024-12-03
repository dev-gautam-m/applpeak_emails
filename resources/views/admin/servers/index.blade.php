@extends('layouts.admin')
@section('content')
@can('server_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.servers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.server.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.server.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Server">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.server.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.server.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.server.fields.hostname') }}
                        </th>
                        <th>
                            {{ trans('cruds.server.fields.username') }}
                        </th>
                        <th>
                            {{ trans('cruds.server.fields.port') }}
                        </th>
                        <th>
                            {{ trans('cruds.server.fields.protocol') }}
                        </th>
                        <th>
                            {{ trans('cruds.server.fields.from_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.server.fields.from_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.server.fields.is_active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servers as $key => $server)
                        <tr data-entry-id="{{ $server->id }}">
                            <td>
                                {{ $server->id ?? '' }}
                            </td>
                            <td>
                                {{ $server->name ?? '' }}
                            </td>
                            <td>
                                {{ $server->hostname ?? '' }}
                            </td>
                            <td>
                                {{ $server->username ?? '' }}
                            </td>
                            <td>
                                {{ $server->port ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Server::PROTOCOL_SELECT[$server->protocol] ?? '' }}
                            </td>
                            <td>
                                {{ $server->from_email ?? '' }}
                            </td>
                            <td>
                                {{ $server->from_name ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $server->is_active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $server->is_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('server_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.servers.show', $server->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('server_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.servers.edit', $server->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('server_delete')
                                    <form action="{{ route('admin.servers.destroy', $server->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('server_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.servers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan
 
  
})

</script>
@endsection