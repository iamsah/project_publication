<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends BackendBaseController
{
    protected $panel = 'Dashboard';
    protected $folder = 'backend.dashboard.';
    protected  $base_route = 'backend.dashboard.';
    protected  $title;
    protected $folder_name = 'dashboard';

    /**
     * Display the dashboard page
     */
    public function index()
    {
//        $data['role'] = Role::find(auth()->user()->role_id);
//        $data['profile'] = Profile::find(auth()->user()->id);
        $data['users'] = User::all()->count();
        $this->title = 'Dashboard';
        return view($this->__loadDataToView($this->folder .'index'),compact('data'));
    }
}
