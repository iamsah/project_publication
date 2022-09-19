<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BackendBaseController extends Controller
{
    /**
     * @var string
     */
    protected  function  __loadDataToView($viewPath){
        view()->composer($viewPath, function ($view) {
            $view->with('panel', $this->panel);
            $view->with('folder', $this->folder);
            $view->with('folder_name', $this->folder_name);
            $view->with('base_route', $this->base_route);
            $view->with('title', $this->title);
            $profile = Profile::where('user_id',auth()->user()->id)->get();
            $view->with('profile', $profile);
            $setting = Setting::get()->first();
            $view->with('setting', $setting);
            $role = Role::find(auth()->user()->role_id);
            $view->with('role', $role);
            $category = Category::where('status',1)->get();
            $view->with('category', $category);
        });
        return $viewPath;
    }

    protected function uploadImage(Request $request,$image_field_name)
    {
        $image = $request->file($image_field_name);
        $image_name = rand(1111, 9999).'_'.$image->getClientOriginalName();
//        dd($this->image_path);
        $image->move($this->image_path, $image_name);
        if (count(config('image_dimension.'.$this->folder_name.'.images')) > 0) {
            foreach (config('image_dimension.'.$this->folder_name.'.images') as $dimension) {
                // open and resize an image file
                $img = Image::make($this->image_path.$image_name)->resize($dimension['width'], $dimension['height']);
                // save the same file as jpg with default quality
                $img->save($this->image_path.$dimension['width'].'_'.$dimension['height'].'_'.$image_name);
            }
            return $image_name;
        }
    }

    protected function deleteImage($image_name)
    {
        $image_name1 = $this->image_path .$image_name;

        if (file_exists($image_name1)){
            unlink($image_name1);
        }

        if (count(config('image_dimension.'.$this->folder_name.'.images')) > 0) {
            foreach (config('image_dimension.'.$this->folder_name.'.images') as $dimension) {
                $dimension['height'];
                $path = $this->image_path.$dimension['width'].'_'.$dimension['height'].'_'.$image_name;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
    }

    protected function uploadFile(Request $request,$file_field_name)
    {
        $file = $request->file($file_field_name);
        $file_name = rand(1111, 9999).'_'.$file->getClientOriginalName();
        $file->move($this->file_path, $file_name);
        return $file_name;
    }

    protected function deleteFile($file_name)
    {
        $file_name = $this->file_path .$file_name;
        if (file_exists($file_name)){
            unlink($file_name);
        }
    }
}
