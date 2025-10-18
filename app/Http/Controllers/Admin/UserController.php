<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function list() {
        $users = User::where('id','!=',\Auth::user()->id)->orderBy('id','desc')->get();
        return view('admin.user.list', compact('users'));
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request) {
        User::create([
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.user.list')->with('storeUser', 'کاربر مورد نظر افزوده گردید');
    }

    public function edit(User $user) {
        return view('admin.user.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $request) {
        $user->update($request->all());
        return redirect()->route('admin.user.list')->with('updateUser', 'کاربر مورد نظر بروزرسانی گردید');
    }

    public function delete(User $user) {
        $user->delete();
        return back()->with('deleteUser', 'کاربر مورد نظر حذف گردید');
    }
}
