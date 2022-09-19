<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::middleware(['check_role_permission','auth'])->prefix('backend/')->name('backend.')->group(function(){

    //dashboard url
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    //dashboard url ends

    //role url
    Route::get('role/assign_permission/{role_id}', [\App\Http\Controllers\RoleController::class,'assignPermission'])->name('role.assign_permission');
    Route::post('role/assign_permission', [\App\Http\Controllers\RoleController::class,'postPermission'])->name('role.post_permission');
    //
    Route::get('role/trash', [\App\Http\Controllers\RoleController::class,'trash'])->name('role.trash');
    Route::post('role/{id}/restore', [\App\Http\Controllers\RoleController::class,'restore'])->name('role.restore');
    Route::delete('role/{id}/force-delete',[\App\Http\Controllers\RoleController::class,'forceDelete'])->name('role.forceDelete');
    //
    Route::resource('role',\App\Http\Controllers\RoleController::class);
    //role url ends

    //module url
    Route::get('module/trash', [\App\Http\Controllers\ModuleController::class,'trash'])->name('module.trash');
    Route::post('module/{id}/restore', [\App\Http\Controllers\ModuleController::class,'restore'])->name('module.restore');
    Route::delete('module/{id}/force-delete',[\App\Http\Controllers\ModuleController::class,'forceDelete'])->name('module.forceDelete');
    //
    Route::resource('module',\App\Http\Controllers\ModuleController::class);
    //module url ends

    //permission url
    Route::get('permission/trash', [\App\Http\Controllers\PermissionController::class,'trash'])->name('permission.trash');
    Route::post('permission/{id}/restore', [\App\Http\Controllers\PermissionController::class,'restore'])->name('permission.restore');
    Route::delete('permission/{id}/force-delete',[\App\Http\Controllers\PermissionController::class,'forceDelete'])->name('permission.forceDelete');
    Route::resource('permission',\App\Http\Controllers\PermissionController::class);
    //permission url ends

    //gender url faculty
    Route::get('gender/trash', [\App\Http\Controllers\GenderController::class,'trash'])->name('gender.trash');
    Route::post('gender/{id}/restore', [\App\Http\Controllers\GenderController::class,'restore'])->name('gender.restore');
    Route::delete('gender/{id}/force-delete',[\App\Http\Controllers\GenderController::class,'forceDelete'])->name('gender.forceDelete');
    Route::resource('gender',\App\Http\Controllers\GenderController::class);
    //gender url ends

    //profile url
    Route::resource('profile',\App\Http\Controllers\ProfileController::class);
    //profile url ends

    //setting url
    Route::resource('setting',\App\Http\Controllers\SettingController::class);
    //setting url ends

    //for ajax to get subcategory by category id
    Route::post('category/getSubcategoryByCategoryId',[\App\Http\Controllers\CategoryController::class,'getSubcategoryByCategoryId'])->name('category.getSubcategory');
    //
    Route::get('category/trash', [\App\Http\Controllers\CategoryController::class,'trash'])->name('category.trash');
    Route::post('category/{id}/restore', [\App\Http\Controllers\CategoryController::class,'restore'])->name('category.restore');
    Route::delete('category/{id}/force-delete',[\App\Http\Controllers\CategoryController::class,'forceDelete'])->name('category.forceDelete');
    Route::resource('category',\App\Http\Controllers\CategoryController::class);
    //category url ends

    //subcategory url
    Route::get('subcategory/trash', [\App\Http\Controllers\SubcategoryController::class,'trash'])->name('subcategory.trash');
    Route::post('subcategory/{id}/restore', [\App\Http\Controllers\SubcategoryController::class,'restore'])->name('subcategory.restore');
    Route::delete('subcategory/{id}/force-delete',[\App\Http\Controllers\SubcategoryController::class,'forceDelete'])->name('subcategory.forceDelete');
    Route::resource('subcategory',\App\Http\Controllers\SubcategoryController::class);
    //subcategory url ends

    //author url
    Route::get('author/trash', [\App\Http\Controllers\AuthorController::class,'trash'])->name('author.trash');
    Route::post('author/{id}/restore', [\App\Http\Controllers\AuthorController::class,'restore'])->name('author.restore');
    Route::delete('author/{id}/force-delete',[\App\Http\Controllers\AuthorController::class,'forceDelete'])->name('author.forceDelete');
    Route::resource('author',\App\Http\Controllers\AuthorController::class);
    //author url ends viewBySubcategoryId

    //book url
    Route::get('book/viewBySubcategoryId/{id}', [\App\Http\Controllers\BookController::class,'viewBySubcategoryId'])->name('book.viewBySubcategoryId');
    Route::get('book/trash', [\App\Http\Controllers\BookController::class,'trash'])->name('book.trash');
    Route::post('book/{id}/restore', [\App\Http\Controllers\BookController::class,'restore'])->name('book.restore');
    Route::delete('book/{id}/force-delete',[\App\Http\Controllers\BookController::class,'forceDelete'])->name('book.forceDelete');
    Route::resource('book',\App\Http\Controllers\BookController::class);
    //book url ends

    Route::resource('user',\App\Http\Controllers\BackendUserController::class);

});

