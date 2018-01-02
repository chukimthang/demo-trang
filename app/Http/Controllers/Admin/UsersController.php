<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();

        return view('admin.user.index', compact('users'));
    }

     public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Xóa thành công'
            ]);
        }
        
        $user->delete();
        
        return redirect()->route('admin.users.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa tài khoản thành công'
        ]);
    }
}
