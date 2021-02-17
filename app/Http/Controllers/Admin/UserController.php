<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\InteractWithFiles;
// use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use InteractWithFiles;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_view'), Response::HTTP_FORBIDDEN);

        $perPage = request('per_page', request()->cookie('users_per_page', 10));
        $users = User::with('role')
                ->when(request('search_term'), function ($q) {
                    $q->whereRaw("name like '%".request('search_term')."%'");
                })
                ->latest()
                ->paginate($perPage);

        cookie()->queue('users_per_page', $perPage);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN);

        $roles = Role::pluck('name', 'id')->prepend('Select', '');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN);

        $data = $this->storeFiles($request->validated());

        User::create($data);

        Session::flash('success_message', 'User Created!');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('user_view'), Response::HTTP_FORBIDDEN);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN);

        $user->load('role');
        $roles = Role::pluck('name', 'id')->prepend('Select', '')->toArray();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN);

        $data = $this->storeFiles($request->validated());

        if (isset($data['photo']) && $data['photo']) {
            \File::delete(public_path("uploads/images/{$user->photo}"));
        }

        $user->update($data);

        Session::flash('success_message', 'User Updated!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN);

        $user->delete();

        Session::flash('success_message', 'User Deleted!');

        return back();
    }

    /**
     * Remove all the given resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyMany()
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN);

        User::whereIn('id', request('ids', []))->delete();

        return response()->json(['success_message' => 'Selected Users Deleted successfully.']);
    }

    /**
     * Export all resource from storage as (csv|excel|pdf) format
     *
     * @param  string $type  Exportable file extension.
     * @return \Illuminate\Http\Response
     */
    // public function export($type)
    // {
    //     abort_if(Gate::denies('export_booking'), Response::HTTP_FORBIDDEN);

    //     return Excel::download(new BookingExport, "Download.{$type}");
    // }
}
