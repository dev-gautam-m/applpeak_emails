<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServerRequest;
use App\Http\Requests\StoreServerRequest;
use App\Http\Requests\UpdateServerRequest;
use App\Models\Server;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('server_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servers = Server::with(['user'])->get();

        return view('admin.servers.index', compact('servers'));
    }

    public function create()
    {
        abort_if(Gate::denies('server_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.servers.create', compact('users'));
    }
    public function store(StoreServerRequest $request)
    { 
        $userId = auth()->id(); 
    
        $server = Server::create(array_merge($request->all(), ['user_id' => $userId]));
    
        return redirect()->route('admin.servers.index');
    }
    

    public function edit(Server $server)
    {
        abort_if(Gate::denies('server_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $server->load('user');

        return view('admin.servers.edit', compact('server', 'users'));
    }

    public function update(UpdateServerRequest $request, Server $server)
    {
        $userId = auth()->id(); 
        $server->update(array_merge($request->all(), ['user_id' => $userId]));

        return redirect()->route('admin.servers.index');
    }

    public function show(Server $server)
    {
        abort_if(Gate::denies('server_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $server->load('user');

        return view('admin.servers.show', compact('server'));
    }

    public function destroy(Server $server)
    {
        abort_if(Gate::denies('server_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $server->delete();

        return back();
    }

    public function massDestroy(MassDestroyServerRequest $request)
    {
        $servers = Server::find(request('ids'));

        foreach ($servers as $server) {
            $server->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
