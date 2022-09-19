<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
class RoleController extends BackendBaseController
{
    protected $panel = 'Role';
    protected $folder = 'backend.role.';
    protected $base_route= 'backend.role.';
    protected $title;
    protected $model;
    protected $folder_name = 'role';

    function __construct()
    {
        $this->model = new Role();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = 'Add';
        return view($this->__loadDataToView($this->folder.'create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $request->request->add(['created_by'=>auth()->user()->id]);
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $data['row'] = $role;
        $this->title = 'View';
        return view($this->__loadDataToView($this->folder.'show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $data['row'] = $role;
        $this->title = 'Edit';
        return view($this->__loadDataToView($this->folder.'edit'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $data['row'] = $role;
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $data['row']  = $role;
        if ($data['row']->delete()){
            request()->session()->flash('success', $this->panel.' deleted successfully');
        } else{
            request()->session()->flash('error', $this->panel.' delete failed');
        }
        return redirect()->route($this->base_route.'index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
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

    // for ajax function to assign permission
    function assignPermission($roleId){
        $data['row'] = Role::find($roleId);

        /* to get assigned permission*/
        $data['permissions'] = $data['row']->permissions()->get();
        $assigned_permission = [];
        foreach($data['permissions'] as $permission){
            array_push($assigned_permission,$permission->id);
        }
        $data['assigned_permission'] = $assigned_permission;
        /*end of assigned permission*/

        $data['modules'] = Module::all();
        $this->title = 'Assign permission';
        return view($this->__loadDataToView($this->folder.'assign_permission'),compact('data'));
    }

    //save a permission from ajax function
    function postPermission(Request $request){
        $data['row'] = Role::find($request->input('role_id'));
        $data['row']->permissions()->sync($request->input('permission_id'));
        return redirect()->route($this->base_route.'index');
    }

}
