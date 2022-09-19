<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Gender;
use App\Models\Profile;

class ProfileController extends BackendBaseController
{
    protected $panel = 'Profile';
    protected $folder = 'backend.profile.';
    protected $folder_name = 'profile';
    protected $base_route= 'backend.profile.';
    protected $title;
    protected $model;

    protected $image_path;
    protected $file_path;

    function __construct()
    {
        $this->image_path = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder_name . DIRECTORY_SEPARATOR;
        $this->file_path = public_path() . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->folder_name . DIRECTORY_SEPARATOR;
        $this->model = new Profile();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Info';
        $data['rows'] = $this->model->where('user_id', auth()->user()->id)->paginate(1);
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = 'Add';
        $data['genders'] = Gender::where('status','1')->pluck('name','id');
        return view($this->__loadDataToView($this->folder.'create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $request->request->add(['user_id'=>auth()->user()->id]);

        //image upload
        if ($request->hasFile('profile_file')) {
            $image = $this->uploadImage($request,'profile_file');
            $request->request->add(['profile' => $image]);
        }
        //file upload
        if ($request->hasFile('cv_file')) {
            $file = $this->uploadFile($request,'cv_file');
            $request->request->add(['cv' => $file]);
        }
        $data['row'] = $this->model->create($request->all());
        if ($data['row']){
            $request->session()->flash('success', $this->panel.' created successfully');
        } else{
            $request->session()->flash('error', $this->panel.' creation failed');
        }
        return redirect()->route($this->base_route.'index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $data['row'] = $profile;
        $this->title = 'View';
        return view($this->__loadDataToView($this->folder.'show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $data['row'] = $profile;
        $data['genders'] = Gender::pluck('name','id');
        $this->title = 'Edit';
        return view($this->__loadDataToView($this->folder.'edit'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {

        $data['row'] = $profile;
        //update image
        if ($request->hasFile('profile_file')) {
            $image = $this->uploadImage($request,'profile_file');
            $request->request->add(['profile' => $image]);
            if ($image){
                $this->deleteImage($data['row']->profile);
            }
        }

        //update cv
        if ($request->hasFile('cv_file')) {

            $file = $this->uploadFile($request,'cv_file');
            $request->request->add(['cv' => $file]);
            if ($file){
                $this->deleteFile($data['row']->cv);
            }
        }

        if ($data['row']->update($request->all())){
            $request->session()->flash('success', $this->panel.' updated successfully');
        } else{
            $request->session()->flash('error', $this->panel.' update failed');
        }
        return redirect()->route($this->base_route.'index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $data['row']  = $profile;
        if ($data['row']->delete()){
            request()->session()->flash('success', $this->panel.' deleted successfully');
        } else{
            request()->session()->flash('error', $this->panel.' delete failed');
        }
        return redirect()->route($this->base_route.'index');
    }
}
