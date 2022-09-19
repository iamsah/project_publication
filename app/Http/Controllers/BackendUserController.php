<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class BackendUserController extends BackendBaseController
{
    protected $panel = 'User';
    protected $folder = 'backend.user.';
    protected $folder_name = 'user';
    protected $base_route= 'backend.user.';
    protected $title;
    protected $model;


    function __construct()
    {
        $this->model = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'List';
        $data['rows'] = $this->model->paginate(10);
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data['row'] = $user;
        $this->title = 'View';
        $data['profiles'] = Profile::get();
        return view($this->__loadDataToView($this->folder.'show'),compact('data'));
    }
}
