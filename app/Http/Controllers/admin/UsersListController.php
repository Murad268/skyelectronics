<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class UsersListController extends Controller
{
    public function index(Request $req) {
        if(session("admin_email")) {
            $siteInfo = Settings::all();
              if(isset($req->userssearch)) {
                $q = $req->userssearch;
                $users =  User::where('name', 'like', '%'.$q.'%')->paginate(2);

            } else {
                $users = User::orderBy('admin', 'desc')->paginate(10);
            }
            
            return view('admin.usersparameters.index', compact('siteInfo', 'users'));
        } else {
            return redirect()->route('admin.loginshow');
        }
    }

    public function addadmin($id) {
        $user = User::where("id", $id);

        $updated = $user->update([
            'admin' => 1
        ]);

        if($updated) {
            return redirect()->back()->with('success', 'İstifadəçi admin elan edildi');
        } else {
            return redirect()->back()->with('error', 'İstifadəçi admin elan edilməsi zamanı xəta');
        }
    }

    public function block($id) {
        $user = User::where("id", $id);

        $updated = $user->update([
            'block' => 1
        ]);

        if($updated) {
            return redirect()->back()->with('success', 'İstifadəçi bloklandı');
        } else {
            return redirect()->back()->with('error', 'İstifadəçinin bloklanması zamanı xəta');
        }
    }

    public function removeblock($id) {
        $user = User::where("id", $id);

        $updated = $user->update([
            'block' => 0
        ]);

        if($updated) {
            return redirect()->back()->with('success', 'İstifadəçi bloklandı');
        } else {
            return redirect()->back()->with('error', 'İstifadəçinin bloklanması zamanı xəta');
        }
    }
}
