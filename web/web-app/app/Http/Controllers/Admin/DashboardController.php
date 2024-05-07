<?php

namespace App\Http\Controllers\Admin;

use App\Models\Euser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    public function users()
    {
        $users = Euser::all();
        return view('admin.users.index',compact('users'));
    }

    public function viewuser($id)
    {
        $users = Euser::find($id);
        return view('admin.users.view',compact('users'));
    }
}
