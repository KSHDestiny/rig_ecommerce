<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::when(request('search'), function($q){
            $q->where('name', 'like', '%'.request('search').'%');
        })->latest()->paginate(5);

        return view('admin.user.index', compact('users'))
        ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.user.form');
    }

    public function store(UserRequest $request)
    {
        $validated = $request->all();
    }

    public function edit(User $user)
    {
        return view('admin.user.form', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $validated = $request->except(['password', 'image']);
        $user->update($validated);
        $user->password = $request['password'] ? Hash::make($request['password']) : $user->password;
        $user->save();
        $this->storeUserImage($user);

        Toastr::success('User Updated Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

    public function storeUserImage($user)
    {
        if (request()->hasFile('photo')) {
            $file      = request()->file('photo');
            $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
            $save_path = public_path('uploads/user');

            $file->move($save_path, $save_path."/$file_name");

            $user->update([
                'photo' => $file_name,
            ]);
        }
    }
}
