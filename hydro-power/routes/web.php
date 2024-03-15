<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InternationalFinancesController;

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/admin', function () {
    return view('admin/login');
});

Route::get('/',[UserController::class,'display']);

Route::get('/about',[UserController::class,'about'])->name('about');
Route::get('/contact',[UserController::class,'contact'])->name('contact');

Route::get('/gallery',[UserController::class,'gallery'])->name('gallery');
Route::get('/gallerydetails/{id}', [UserController::class, 'gallerydetails']);



Route::get('/blog',[UserController::class,'blog'])->name('blog');
Route::get('/ViewBlogDetails/{id}',[UserController::class,'ViewBlogDetails']);

Route::get('/get-project-details', [CompanyController::class, 'getProjectDetails']);

Route::get('/search-projects', 'ProjectController@search');





Route::get('/get-project-details/{projectId}', 'ProjectController@getProjectDetails');

Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
Route::get('admin/dashboard',[AdminController::class,'dashboard']);


  Route::get('admin/company',[CompanyController::class,'index']);
  Route::get('admin/company',[CompanyController::class,'show']);
  Route::get('admin/add_companydetails',[CompanyController::class,'add_companydetails'])->name('add_company');
  Route::post('admin/added_companydetails',[CompanyController::class,'store'])->name('added_company');
  Route::get('admin/editcompanydetails/{id}',[CompanyController::class,'editcompanydetails']);
  Route::put('admin/editscompanydetails/{id}',[CompanyController::class,'updatecompanydetails'])->name('update_company');
  Route::get('admin/company/delete/{id}',[CompanyController::class,'delete']);

  Route::get('admin/inter_finance',[InternationalFinancesController::class,'index']);
  Route::get('admin/inter_finance',[InternationalFinancesController::class,'show']);
  Route::get('admin/add_financedetails',[InternationalFinancesController::class,'add_financedetails'])->name('add_finance');
  Route::post('admin/added_financedetails',[InternationalFinancesController::class,'store'])->name('added_finance');
  Route::get('admin/editfinancedetails/{id}',[InternationalFinancesController::class,'editfinancedetails']);
  Route::put('admin/editsfinancedetails/{id}',[InternationalFinancesController::class,'updatefinancedetails'])->name('update_finance');
  Route::get('admin/finance/delete/{id}',[InternationalFinancesController::class,'delete']);


  Route::get('admin/project',[ProjectController::class,'index']);
  Route::get('admin/project',[ProjectController::class,'show']);
  Route::get('admin/add_projectdetails',[ProjectController::class,'add_projectdetails'])->name('add_project');
  Route::post('admin/added_projectdetails',[ProjectController::class,'store'])->name('added_project');
  Route::get('admin/editprojectdetails/{id}',[ProjectController::class,'editprojectdetails']);
  Route::put('admin/editsprojectdetails/{id}',[ProjectController::class,'updateprojectdetails'])->name('update_project');
  Route::get('admin/project/delete/{id}',[ProjectController::class,'delete']);

  
  Route::get('admin/gallery',[GalleryController::class,'index']);
  Route::get('admin/add_gallerydetails',[GalleryController::class,'add_gallerydetails'])->name('add_gallery');
  Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
  Route::get('admin/editgallerydetails/{id}',[GalleryController::class,'editgallerydetails']);
  Route::put('admin/editsgallerydetails/{id}',[GalleryController::class,'updategallerydetails'])->name('update_gallery');
  Route::get('admin/gallery/delete/{id}',[GalleryController::class,'delete']);
Route::delete('/remove-image/{id}', [GalleryController::class, 'removeImage'])->name('remove_image');



  Route::get('admin/about',[AboutController::class,'index']);
  Route::get('admin/editaboutdetails/{id}',[AboutController::class,'editaboutdetails']);
  Route::put('admin/editsaboutdetails/{id}',[AboutController::class,'updateaboutdetails'])->name('update_about');

  Route::get('admin/contact',[ContactController::class,'index']);
  Route::get('admin/editcontactdetails/{id}',[ContactController::class,'editcontactdetails']);
  Route::put('admin/editscontactdetails/{id}',[ContactController::class,'updatecontactdetails'])->name('update_contact');

  Route::get('admin/blog',[BlogController::class,'index']);
  Route::get('admin/blog',[BlogController::class,'show']);
  Route::get('admin/add_blogdetails',[BlogController::class,'add_blogdetails'])->name('add_blog');
  Route::post('admin/added_blogdetails',[BlogController::class,'store'])->name('added_blog');
  Route::get('admin/editblogdetails/{id}',[BlogController::class,'editblogdetails']);
  Route::put('admin/editsblogdetails/{id}',[BlogController::class,'updateblogdetails'])->name('update_blog');
  Route::get('admin/blog/delete/{id}',[BlogController::class,'delete']);

    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN',true);
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout Successfully');
        return redirect('admin');
    });

}); 