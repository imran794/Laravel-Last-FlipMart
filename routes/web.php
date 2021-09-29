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
Use App\Http\Controllers\Admin\AllOrdersController;
Use App\Http\Controllers\Admin\SubCategoryController;
Use App\Http\Controllers\Admin\SubSubCategoryController;
Use App\Http\Controllers\Admin\CouponController;
Use App\Http\Controllers\Admin\ShipingAreaController;
Use App\Http\Controllers\Admin\ProductController;
Use App\Http\Controllers\Admin\ReportController;
Use App\Http\Controllers\Admin\ReviweController;
Use App\Http\Controllers\Admin\StockController;
Use App\Http\Controllers\User\WishlistController;
Use App\Http\Controllers\User\CheckoutController;
Use App\Http\Controllers\User\OrderController;
Use App\Http\Controllers\User\StripeController;
Use App\Http\Controllers\User\RatingController;
Use App\Http\Controllers\SslCommerzPaymentController;
Use App\Http\Controllers\TrackController;
use App\Http\Controllers\Auth\LoginController;
Use App\Http\Controllers\Frontend\IndexController;
Use App\Http\Controllers\Frontend\ProfileController;
Use App\Http\Controllers\Frontend\LanguageController;
Use App\Http\Controllers\Frontend\CartController;
Use App\Http\Controllers\Frontend\SearchController;
Use App\Http\Controllers\Frontend\ShopController;

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
Route::get('mini/cart/add', [CartController::class, 'minicart']);
Route::get('/minicart/remove/{id}', [CartController::class, 'minicartremove']);


Route::get('/Cart/decrement/{id}', [CartController::class, 'Cartdecrement']);
Route::get('/cart/increment/{id}', [CartController::class, 'cartincrement']);


   
// cart page

Route::get('cart',[CartController::class, 'create'])->name('cart');
Route::get('/get/cart/product', [CartController::class, 'getcartproduct']);
Route::get('/Cart/remove/{rowId}', [CartController::class, 'Cartremove']);

// coupon 
 Route::post('/coupon/apply', [CartController::class, 'couponapply']);
 Route::get('/coupon/calculation', [CartController::class, 'couponcalculation']);
 Route::get('/coupon/remove', [CartController::class, 'removeCoupon']);

 // checkout

 Route::get('checkout',[CartController::class, 'checkout'])->name('checkout');


   // wishlist

 Route::post('/add/to/wishlist/{id}', [CartController::class, 'addtowishlist']);
 Route::get('wishlist', [WishlistController::class, 'create'])->name('wishlist');
 Route::get('get/wishlist/product', [WishlistController::class, 'showwishlist']);
 Route::get('wishlist/remove/{id}', [WishlistController::class, 'wishlistremove']);




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


    // all user

    Route::get('all/user', [ProfileController::class, 'AllUser'])->name('all.user');
    Route::get('/user/banned/{id}', [ProfileController::class, 'userbanned']);
    Route::get('/user/unbanned/{id}', [ProfileController::class, 'unbanned']);
    Route::get('all/user', [ProfileController::class, 'AllUser'])->name('all.user');


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


      // coupon
    Route::resource('coupon', CouponController::class);
    Route::get('couponinactive/{id}',[CouponController::class, 'couponinactive']);
    Route::get('couponactive/{id}',[CouponController::class, 'couponactive']);   


     // shiping Area
    Route::resource('shipingarea', ShipingAreaController::class); 

   Route::get('shipdistrict/index',[ShipingAreaController::class, 'shipdistrictindex'])->name('shipdistrict.index'); 
   Route::post('distinct/store',[ShipingAreaController::class, 'distinctstore'])->name('distinct.store'); 
   Route::get('distinct/edit/{id}',[ShipingAreaController::class, 'distinctedit'])->name('distinct.edit'); 
   Route::post('distinct/update/{id}',[ShipingAreaController::class, 'distinctupdate'])->name('distinct.update'); 
   Route::get('distinct/destroy/{id}',[ShipingAreaController::class, 'distinctdestroy'])->name('distinct.destroy');



   Route::get('state/index',[ShipingAreaController::class, 'stateindex'])->name('state.index'); 
   Route::get('district-get/ajax/{division_id}',[ShipingAreaController::class, 'getajax']); 
   Route::post('state/store',[ShipingAreaController::class, 'statestore'])->name('state.store'); 
   Route::get('state/edit/{id}',[ShipingAreaController::class, 'stateedit'])->name('state.edit'); 
   Route::post('state/update/{id}',[ShipingAreaController::class, 'stateupdate'])->name('state.update'); 
   Route::get('state/destroy/{id}',[ShipingAreaController::class, 'statedestroy'])->name('state.destroy'); 

   // order

   Route::get('pendding/order',[AllOrdersController::class, 'penddingorder'])->name('pendding.order');
   Route::get('confirm/order',[AllOrdersController::class, 'ConfirmOrder'])->name('confirm.order');
   Route::get('processing/order',[AllOrdersController::class, 'ProcessingOrder'])->name('processing.order');
   Route::get('picked/order',[AllOrdersController::class, 'PickedOrder'])->name('picked.order');
   Route::get('shipped/order',[AllOrdersController::class, 'ShippedOrder'])->name('shipped.order');
   Route::get('delivered/order',[AllOrdersController::class, 'DeliveredOrder'])->name('delivered.order');
   Route::get('Cancel/order',[AllOrdersController::class, 'CancelOrder'])->name('Cancel.order');
   Route::get('/orders/view/{id}',[AllOrdersController::class, 'OrderView']);


   // order status update

   
   Route::get('/penddingToconfirm/{id}',[AllOrdersController::class, 'PenddingToConfirm']);
   Route::get('/confirmtoprocessing/{id}',[AllOrdersController::class, 'ConfirmToProcessing']);
   Route::get('/processToPicked/{id}',[AllOrdersController::class, 'ProcessToPicked']);
   Route::get('/PickedtoShipped/{id}',[AllOrdersController::class, 'PickedtoShipped']);
   Route::get('/ShippedTodelivery/{id}',[AllOrdersController::class, 'ShippedToDelivery']);
   Route::get('/pendingTocancel/{id}',[AllOrdersController::class, 'PendingToCancel']);
   Route::get('/invoice-download/{id}',[AllOrdersController::class, 'invoicedownload']);
   Route::get('/orders/delete/{id}',[AllOrdersController::class, 'OrdersDelete']);

   // reports

  Route::get('reports',[ReportController::class, 'Index'])->name('reports');
  Route::post('search/by/date',[ReportController::class, 'SearchByDate'])->name('search.by.date');
  Route::post('search/by/month',[ReportController::class, 'SearchByMonth'])->name('search.by.month');
  Route::post('search/by/year',[ReportController::class, 'SearchByYear'])->name('search.by.year');

  // review

  Route::get('review',[ReviweController::class, 'Review'])->name('review');
  Route::get('/review/approve/{id}',[ReviweController::class, 'ReviewApprove']);
  Route::get('/review/delete/{id}',[ReviweController::class, 'ReviewDelete']);

  // stock management

  Route::get('stock/management',[StockController::class, 'Index'])->name('stock.management');
  Route::get('stock/edit/{id}',[StockController::class, 'StockEdit']);
  Route::post('stock/update/{id}',[StockController::class, 'StockUpdate'])->name('stock.update');


 


});

Route::group(['prefix'=>'user','middleware' =>['user','auth']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');

      // profile
    Route::post('profile/update', [ProfileController::class, 'UdateProfile'])->name('profile.update');
    Route::get('image', [ProfileController::class, 'Image'])->name('image');
    Route::post('image/update', [ProfileController::class, 'ImageUpdate'])->name('image.update');
    Route::get('change/password', [ProfileController::class, 'ChangePassword'])->name('change.password');
    Route::post('password/store', [ProfileController::class, 'PasswordStore'])->name('password.store');

    // checkout 
      Route::get('district-get/ajax/{division_id}',[CheckoutController::class, 'getajax']); 
      Route::get('state-get/ajax/{district_id}',[CheckoutController::class, 'getajaxjstate']); 
      Route::post('checkout/store',[CheckoutController::class, 'checkoutstore'])->name('checkout.store'); 

    // stripe 

    Route::post('stripe/store',[StripeController::class, 'store'])->name('stripe.store'); 


    // order
    Route::get('my/order',[OrderController::class, 'myorder'])->name('my-order'); 
    Route::get('/order-view/{id}',[OrderController::class, 'orderview']); 
    Route::get('/invoice-download/{id}',[OrderController::class, 'invoicedownload']); 

  // retrun order

   Route::post('return/order', [OrderController::class, 'returnorder'])->name('return.order');
   Route::get('return/order/submit', [OrderController::class, 'ReturnOrderSubmit'])->name('return-order-submit');
   Route::get('cancel/order', [OrderController::class, 'CancelOrder'])->name('cancel-order');

   // 
   Route::get('/review/create/{product_id}',[RatingController::class, 'ReviewCreate']);
   Route::post('/reviwe/strore',[RatingController::class, 'ReviweStrore'])->name('reviwe.strore');

 
});


// SSLCOMMERZ Start
Route::group(['middleware' =>['user','auth']], function(){
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
});
//SSLCOMMERZ END


Route::get('english/language',[LanguageController::class, 'enalish'])->name('english.language');
Route::get('bangla/language',[LanguageController::class, 'bangla'])->name('bangla.language');


// socialite

Route::get('login/google',[LoginController::class, 'LoginGoogle'])->name('login.google');
Route::get('login/google/callback',[LoginController::class, 'handleGoogleCallback']);

Route::get('login/facebook',[LoginController::class, 'LoginFacebook'])->name('login.facebook');
Route::get('login/facebook/callback',[LoginController::class, 'handleFacebookCallback']);


// order track

 Route::post('order/track',[TrackController::class, 'OrderTrack'])->name('order.track');


// search 

 Route::get('search/product',[SearchController::class, 'SearchProduct'])->name('search.product');
 Route::post('/find-products',[SearchController::class,'findProducts']);


// shop pages


 Route::get('shop',[ShopController::class, 'Index'])->name('shop');
 Route::post('shop/filter',[ShopController::class, 'ShopFilter'])->name('shop.filter');
