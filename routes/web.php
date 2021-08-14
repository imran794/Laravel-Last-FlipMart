<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
Use App\Http\Controllers\Admin\AdminController;
Use App\Http\Controllers\Admin\BlogController;
Use App\Http\Controllers\Admin\RoleController;
Use App\Http\Controllers\Admin\BannerController;
Use App\Http\Controllers\Admin\CinformationController;
Use App\Http\Controllers\Admin\BrandController;
Use App\Http\Controllers\Admin\FaqController;
Use App\Http\Controllers\Admin\TestimonialController;
Use App\Http\Controllers\Admin\CategoryController;
Use App\Http\Controllers\Admin\SubCategoryController;
Use App\Http\Controllers\Admin\SubSubCategoryController;
Use App\Http\Controllers\Admin\ProductController;
Use App\Http\Controllers\Frontend\IndexController;
Use App\Http\Controllers\Frontend\ProfileController;
Use App\Http\Controllers\Frontend\LanguageController;
Use App\Http\Controllers\Frontend\CartController;

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



Route::get('/', [IndexController::class, 'Index']);
Route::get('product/details/{id}/{slug}',[IndexController::class, 'productdetails']);
Route::get('blog/page',[IndexController::class, 'blogpage'])->name('blog.page');
Route::get('blog/details/{slug}',[IndexController::class, 'blogdetails'])->name('blog.details');
Route::get('faq/page',[IndexController::class, 'faqpage'])->name('faq.page');
Route::get('contact/us',[IndexController::class, 'contact'])->name('contact.us');
Route::post('contact/store',[IndexController::class, 'contactstore'])->name('contact.store');
Route::get('contact/index',[IndexController::class, 'contactindex'])->name('contact.index');
Route::get('contact/show/{id}',[IndexController::class, 'contactshow'])->name('contact.show');
Route::get('contact/delete/{id}',[IndexController::class, 'contactdelete'])->name('contact.delete');
Route::get('product/tag/{tags}',[IndexController::class, 'producttag'])->name('product.tag');
Route::get('subsubcategory/product/{id}/{slug}',[IndexController::class, 'subsubcategoryproduct']);

Route::get('product/view/model/{id}', [IndexController::class, 'productviewmodelajax']);


Route::post('cart/data/store/{id}', [CartController::class, 'cartdatastore']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' =>['admin','auth']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

     // profile
    Route::get('edit/profile', [ProfileController::class, 'EditProfile'])->name('edit.profile');
    Route::post('profile/update/ad', [ProfileController::class, 'UdateProfilead'])->name('profile.update.ad');
    Route::get('image/ad', [ProfileController::class, 'Imagead'])->name('image.ad');
    Route::post('image/update/ad', [ProfileController::class, 'ImageUpdatead'])->name('image.update.ad');
    Route::get('change/password/ad', [ProfileController::class, 'ChangePasswordad'])->name('change.password.ad');
    Route::post('password/store/ad', [ProfileController::class, 'PasswordStoread'])->name('password.store.ad');


    // role management
    Route::get('role/index',[RoleController::class,'RoleIndex'])->name('role.index');
    Route::post('role/store',[RoleController::class,'RoleStore'])->name('role.store');
    Route::post('role/assign',[RoleController::class,'RoleAssign'])->name('role.assign');
    Route::get('permission/edit/{id}',[RoleController::class,'PermissionEdit'])->name('permission.edit');
    Route::post('permission/update',[RoleController::class,'PermissionUpdate'])->name('permission.update');
    Route::get('add/user',[AdminController::class,'AddUser'])->name('add.user');
    Route::post('user/store',[AdminController::class,'UserStore'])->name('user.store');
    Route::get('user/delete/{id}',[AdminController::class,'UserDelete'])->name('user.delete');


    // brand
    Route::resource('brand', BrandController::class);
    Route::get('brabdinactive/{id}',[BrandController::class, 'brabdinactive']);
    Route::get('brabdactive/{id}',[BrandController::class, 'brabdactive']); 


     // category
    Route::resource('category', CategoryController::class);
    Route::get('categoryinactive/{id}',[CategoryController::class, 'categoryinactive']);
    Route::get('categoryactive/{id}',[CategoryController::class, 'categoryactive']);

         // sub category
    Route::resource('subcategory', SubCategoryController::class);
    Route::get('subinactive/{id}',[SubCategoryController::class, 'subinactive']);
    Route::get('subactive/{id}',[SubCategoryController::class, 'subactive']);      

     // sub sub category
    Route::resource('subsubcategory', SubSubCategoryController::class);
    Route::get('subcategory/ajax/{cat_id}',[SubSubCategoryController::class,'getSubCat']);   


      // products
    Route::resource('product', ProductController::class);
    Route::get('proinactive/{id}',[ProductController::class, 'proinactive']);
    Route::get('proactive/{id}',[ProductController::class, 'proactive']);
    Route::get('sub/subcategory/ajax/{subcat_id}',[ProductController::class,'getsubSubCat']);  
    Route::post('thumpnil/image/update',[ProductController::class,'imageupdate'])->name('thumpnil.image.update');  
    Route::post('update/multiple/image',[ProductController::class,'updatemultiple'])->name('update.multiple.image');  
    Route::get('product/multi/delete/{id}',[ProductController::class,'multiImageDelete']);  
   

       // Banner
    Route::resource('banner', BannerController::class);
    Route::get('baninactive/{id}',[BannerController::class, 'baninactive']);
    Route::get('banactive/{id}',[BannerController::class, 'banactive']);    


       // testimonial
    Route::resource('testimonial', TestimonialController::class);
    Route::get('testinactive/{id}',[TestimonialController::class, 'testinactive']);
    Route::get('testactive/{id}',[TestimonialController::class, 'testactive']);  


       // blog
    Route::resource('blog', BlogController::class);
    Route::get('bloginactive/{id}',[BlogController::class, 'bloginactive']);
    Route::get('blogactive/{id}',[BlogController::class, 'blogactive']);  

       // faq
    Route::resource('faq', FaqController::class);
    Route::get('faqinactive/{id}',[FaqController::class, 'faqinactive']);
    Route::get('faqactive/{id}',[FaqController::class, 'faqactive']);

        // CinformationController
    Route::resource('cinformation', CinformationController::class);
    Route::get('inforinactive/{id}',[CinformationController::class, 'inforinactive']);
    Route::get('inforactive/{id}',[CinformationController::class, 'inforactive']);  


 


 
});

Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'user'], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');

      // profile
    Route::post('profile/update', [ProfileController::class, 'UdateProfile'])->name('profile.update');
    Route::get('image', [ProfileController::class, 'Image'])->name('image');
    Route::post('image/update', [ProfileController::class, 'ImageUpdate'])->name('image.update');
    Route::get('change/password', [ProfileController::class, 'ChangePassword'])->name('change.password');
    Route::post('password/store', [ProfileController::class, 'PasswordStore'])->name('password.store');
});


Route::get('english/language',[LanguageController::class, 'enalish'])->name('english.language');
Route::get('bangla/language',[LanguageController::class, 'bangla'])->name('bangla.language');