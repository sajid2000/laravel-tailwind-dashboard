<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RoleExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Facades\App\Repositories\PermissionRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_view'), Response::HTTP_FORBIDDEN);

        $perPage     = request('per_page', request()->cookie('roles_per_page', 10));
        $permissions = PermissionRepository::all();
        $roles       = Role::select('*')
                            ->when(request('search_term'), function ($q) {
                                $q->whereRaw("name like '%".request('search_term')."%'");
                            })
                            ->latest()
                            ->paginate($perPage);

        cookie()->queue('roles_per_page', $perPage, 10);

        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN);

        return view('admin.roles.create')->withPermissions(PermissionRepository::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN);

        Role::create($request->validated());

        Session::flash('success_message', 'Role Added!');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_view'), Response::HTTP_FORBIDDEN);

        $permissions = PermissionRepository::all();

        return view('admin.roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN);

        $permissions = PermissionRepository::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN);

        $role->update($request->validated());

        Session::flash('success_message', 'Role Updated!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN);

        $role->delete();

        Session::flash('success_message', 'Role Deleted!');

        return back();
    }

    /**
     * Remove all the given resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyMany()
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN);

        Role::whereIn('id', request('ids', []))->delete();

        return response()->json(['success_message' => 'Selected Roles Deleted successfully.']);
    }

    /**
     * Export all the resource
     *
     * @param  string  $type  Exportable type (csv|excel|pdf)
     * @return \Illuminate\Http\Response
     */
    public function export($type)
    {
        return Excel::download(new RoleExport, "Download.{$type}");
    }
}
