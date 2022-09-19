<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMunicipalityRequest;
use App\Http\Requests\UpdateMunicipalityRequest;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Province;

class MunicipalityController extends BackendBaseController
{
    protected $panel = 'Municipality';
    protected $folder = 'backend.municipality.';
    protected $base_route= 'backend.municipality.';
    protected $title;
    protected  $model;

    function __construct()
    {
        $this->model = new Municipality();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = $this->model->paginate(10);
        $this->title = 'List';
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
        $data['provinces'] = Province::pluck('name','id');
        $data['districts'] = District::pluck('name','id');
        return view($this->__loadDataToView($this->folder.'create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMunicipalityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMunicipalityRequest $request)
    {
        $request->request->add(['created_by'=>auth()->user()->id]);
        $data['row'] = $this->model->create($request->all());
        if ($data['row']){
            $request->session()->flash('success', $this->panel.' created successfully');
        } else{
            $request->session()->flash('error', $this->panel.' creation failed');
        }
        return redirect()->route($this->base_route . 'index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function show(Municipality $municipality)
    {
        $data['row'] = $municipality;
        $this->title = 'View';
        return view($this->__loadDataToView($this->folder.'show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipality $municipality)
    {
        $data['provinces'] = Province::pluck('name','id');
        $data['districts'] = District::pluck('name','id');
        $data['row'] = $municipality;
        $this->title = 'Edit';
        return view($this->__loadDataToView($this->folder.'edit'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMunicipalityRequest  $request
     * @param  \App\Models\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMunicipalityRequest $request, Municipality $municipality)
    {
        $data['row'] = $municipality;
        $request->request->add(['updated_by'=>auth()->user()->id]);
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
     * @param  \App\Models\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipality $municipality)
    {
        $data['row']  = $municipality;
        if ($data['row']->delete()){
            request()->session()->flash('success', $this->panel.' deleted successfully');
        } else{
            request()->session()->flash('error', $this->panel.' delete failed');
        }
        return redirect()->route($this->base_route.'index');
    }
    public function trash(){
        $this->title = 'Trash List';
        $data['rows'] = $this->model->onlyTrashed()->orderby('deleted_at','desc')->paginate(10);
        return view($this->__loadDataToView($this->folder.'trash'),compact('data'));
    }

    public function restore($id){
        $data['row'] = $this->model->where('id',$id)->withTrashed()->first();
        if ($data['row']->restore()){
            request()->session()->flash('success', $this->panel.' restored successfully');
        } else{
            request()->session()->flash('error', $this->panel.' restore failed');
        }
        return redirect()->route($this->base_route.'index');
    }

    public function forceDelete($id){
        $data['row'] = $this->model->where('id',$id)->withTrashed()->first();
        if ($data['row']->forceDelete()){
            request()->session()->flash('success', $this->panel.' premanently deleted');
        } else{
            request()->session()->flash('error', $this->panel.' delete failed');
        }
        return redirect()->route($this->base_route.'trash');
    }
}
