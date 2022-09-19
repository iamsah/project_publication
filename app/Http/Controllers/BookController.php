<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class BookController extends BackendBaseController
{
    protected $panel = 'Book';
    protected $folder = 'backend.book.';
    protected $folder_name = 'book';
    protected $base_route= 'backend.book.';
    protected $title;
    protected $model;

    protected $image_path;
    protected $file_path;

    function __construct()
    {
        $this->authorizeResource(Book::class,'book');
        $this->image_path = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder_name . DIRECTORY_SEPARATOR;
        $this->file_path = public_path() . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->folder_name . DIRECTORY_SEPARATOR;
        $this->model = new Book();
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
        $data['authors'] = Author::pluck('first_name','id');
        $data['categories'] = Category::pluck('name','id');
        $data['subcategories'] = Subcategory::pluck('name','id');
        return view($this->__loadDataToView($this->folder.'create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

        DB::beginTransaction();
        try {

            //image upload
            if ($request->hasFile('book_cover_file')) {
                $image = $this->uploadImage($request,'book_cover_file');
                $request->request->add(['book_cover' => $image]);
            }
            //file upload
            if ($request->hasFile('pdf_file')) {
                $file = $this->uploadFile($request, 'pdf_file');
                $request->request->add(['pdf' => $file]);
            }

            $request->request->add(['created_by' => auth()->user()->id]);

            $data['row'] = $this->model->create($request->all());

            $data['row']->authors()->sync($request->input('author_id'));
//        $author_id = $request->input('author_id');
            if ($data['row']) {
                $request->session()->flash('success', $this->panel . ' created successfully');
            } else {
                $request->session()->flash('error', $this->panel . ' creation failed');
            }

            DB::commit();
        } catch (Exception $exception)
        {
            DB::rollback();
        }

        return redirect()->route($this->base_route.'index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $data['row'] = $book;
        $this->title = 'View';
        return view($this->__loadDataToView($this->folder.'show'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $data['row'] = $book;
        $data['authors'] = Author::pluck('first_name','id');
        $data['categories'] = Category::pluck('name','id');
        $data['subcategories'] = Subcategory::pluck('name','id');
        $this->title = 'Edit';
        return view($this->__loadDataToView($this->folder.'edit'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $data['row'] = $book;
        //update image
        if ($request->hasFile('book_cover_file')) {
            $image = $this->uploadImage($request,'book_cover_file');
            $request->request->add(['book_cover' => $image]);
            if ($image){
                $this->deleteImage($data['row']->book_cover);
            }
        }
        //update pdf
        if ($request->hasFile('pdf_file')) {
            $file = $this->uploadFile($request,'pdf_file');
            $request->request->add(['pdf' => $file]);
            if ($file){
                $this->deleteFile($data['row']->pdf);
            }
        }
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
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $data['row']  = $book;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewBySubcategoryId($id)
    {
        $this->title = 'List';
        $data['rows'] = $this->model->where('subcategory_id',$id)->paginate(10);
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));
    }
}
