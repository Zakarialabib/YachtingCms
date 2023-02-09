<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\BackEndViewController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\FaqController;

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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:ADMIN']], function () {

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    Route::get('/dashboard',[BackEndViewController::class, 'dashboard'])->name('dashboard');
    Route::get('/home-settings',[BackEndViewController::class, 'settings'])->name('home_settings');
    Route::post('/home-settings/update',[BackEndViewController::class, 'settingsUpdate'])->name('settings.update');
    
    // Country
    Route::resource('country', CountryController::class, ['except' => ['store', 'update', 'destroy']]);

    // City
    Route::resource('city', CityController::class, ['except' => ['store', 'update', 'destroy']]);

    Route::get('/boats', 'BoatsController@index' )->name('admin.boats');
    Route::get('/boat/edit/{boat}', 'BoatsController@edit' )->name('admin.edit.boat');
    Route::get('/boat/add/', 'BoatsController@add' )->name('admin.add.boat');
    Route::get('/boats/search-result', 'BoatsController@search' )->name('admin.search.boat');

    // Currency
    Route::resource('currency', CurrencyController::class, ['except' => ['store', 'update', 'destroy']]);
    
    // FAQ Route
    Route::resource('faq', FaqController::class, ['except' => ['store', 'update', 'destroy']]);

    Route::get('/category/{type}', 'CategoryController@list')->name('category.list');
    Route::post('/category', 'CategoryController@create')->name('category_create');
    Route::put('/category', 'CategoryController@update')->name('category_update');
    Route::delete('/category/{id}', 'CategoryController@destroy')->name('category_delete');

    Route::get('/amenity', 'AmenitiesController@index')->name('admin.amenities');
    Route::get('/amenity/add','AmenitiesController@add')->name('admin.add.amenity');
    Route::get('/amenity/edit/{amenity}','AmenitiesController@edit')->name('admin.edit.amenity');
    Route::get('/amenities/search-result', 'AmenitiesController@search')->name('admin.search.amenity');

    Route::get('/amenities', 'AmenitiesController@list')->name('amenities_list');
    Route::post('/amenities', 'AmenitiesController@create')->name('amenities_create');
    Route::put('/amenities', 'AmenitiesController@update')->name('amenities_update');
    Route::delete('/amenities/{id}', 'AmenitiesController@destroy')->name('amenities_delete');

    Route::get('/places-type', 'PlaceTypeController@list')->name('place_type_list');
    Route::post('/place-type', 'PlaceTypeController@create')->name('place_type_create');
    Route::put('/place-type', 'PlaceTypeController@update')->name('place_type_update');
    Route::delete('/place-type/{id}', 'PlaceTypeController@destroy')->name('place_type_delete');
 
    Route::get('/category-type', 'CategoryTypeController@list')->name('category_type_list');
    Route::post('/category-type', 'CategoryTypeController@create')->name('category_type_create');
    Route::put('/category-type', 'CategoryTypeController@update')->name('category_type_update');
    Route::delete('/category-type/{id}', 'CategoryTypeController@destroy')->name('category_type_delete');

    Route::resource('/place', 'PlaceController');
    Route::get('/place', 'PlaceController@list')->name('place_list');
    Route::get('/places/create', 'PlaceController@create')->name('place_create');
    Route::post('/place/store', 'PlaceController@store')->name('place_store');
    Route::get('/place/edit/{id}', 'PlaceController@edit')->name('place_edit');
    Route::put('/place/update/{id}', 'PlaceController@update')->name('place_update');
    Route::delete('/place/{id}', 'PlaceController@destroy')->name('place_delete');

    Route::get('/offer', 'OfferController@list')->name('offer_list');
    Route::get('/offer/create', 'OfferController@create')->name('offer_create');
    Route::post('/offer/store', 'OfferController@store')->name('offer_store');
    Route::get('/offer/edit/{id}', 'OfferController@edit')->name('offer_edit');
    Route::put('/offer/update/{id}', 'OfferController@update')->name('offer_update');
    Route::delete('/offer/{id}', 'OfferController@destroy')->name('offer_delete');

    Route::get('/packages', 'PackageController@index')->name('package_index');
    Route::get('/packages/create', 'PackageController@create')->name('package_create');
    Route::post('/packages', 'PackageController@store')->name('package_store');
    Route::get('/packages/{id}/edit', 'PackageController@edit')->name('package_edit');
    Route::put('/packages/{id}', 'PackageController@update')->name('package_update');
    Route::delete('/packages/{id}', 'PackageController@delete')->name('package_delete');

    Route::get('/blog', 'PostController@list')->name('post_list_blog');
    Route::get('/pages', 'PostController@list')->name('post_list_page');

    Route::get('/posts/add/{type}', 'PostController@pageCreate')->name('post_add');
    Route::get('/posts/{id}', 'PostController@pageCreate')->name('post_edit');
    Route::post('/posts', 'PostController@create')->name('post_create');
    Route::put('/posts', 'PostController@update')->name('post_update');
    Route::delete('/posts/{id}', 'PostController@destroy')->name('post_delete');
    
    Route::get('/review', 'ReviewController@list')->name('review_list');
    Route::delete('/review', 'ReviewController@destroy')->name('review_delete');

    Route::group(['prefix' => 'booking'],function(){
        Route::get('/', 'BookingController@list')->name('booking_list');
        Route::get('/add', 'BookingController@create')->name('booking_create');
        Route::post('/store', 'BookingController@store')->name('booking_store');
        Route::get('/edit/{id}', 'BookingController@edit')->name('booking_edit');
        Route::put('/update', 'BookingController@update')->name('booking_update');
        Route::put('/', 'BookingController@updateStatus')->name('booking_update_status');
        Route::delete('/{id}', 'BookingController@destroy')->name('booking_delete');
    });
      
    Route::group(['prefix' => 'purchases'],function(){
        Route::get('/', 'PurchaseController@list')->name('purchase_list');
        Route::get('/ajax-delete-file', 'PurchaseController@deletePurchaseFile');
        Route::get('/add', 'PurchaseController@createView')->name('purchase_create_view');
        Route::post('/', 'PurchaseController@create')->name('purchase_create');
        Route::get('/edit/{id}', 'PurchaseController@edit')->name('purchase_edit');
        Route::put('/update/{id}', 'PurchaseController@update')->name('purchase_update');
        Route::delete('/{id}', 'PurchaseController@destroy')->name('purchase_delete');
        Route::get('gen_quotation/{id}', 'PurchaseController@genQuotation')->name('purchase_quotation');
        Route::get('/status', 'PurchaseController@updateStatus');
    });

    Route::group(['prefix' => 'sales'],function(){
        Route::get('/', 'SaleController@list')->name('sale_list');
        Route::get('/ajax-delete-file', 'SaleController@deleteSaleFile');
        Route::get('/add', 'SaleController@createView')->name('sale_create_view');
        Route::post('/add', 'SaleController@create')->name('sale_create');
        Route::get('/edit/{id}', 'SaleController@edit')->name('sale_edit');
        Route::put('/update/{id}', 'SaleController@update')->name('sale_update');
        Route::delete('/{id}', 'SaleController@destroy')->name('sale_delete');
        Route::get('gen_devis/{id}', 'SaleController@genQuotation')->name('sale_quotation');
        Route::get('/status', 'SaleController@updateStatus');
    });
    
    Route::group(['prefix' => 'ruturn'],function(){

        Route::get('/', 'ReturnController@list')->name('return_list');
        Route::get('/ajax-delete-file', 'ReturnController@deleteSaleFile');
        Route::get('/add', 'ReturnController@createView')->name('return_create_view');
        Route::post('/', 'ReturnController@create')->name('return_create');
        Route::get('/edit/{id}', 'ReturnController@edit')->name('return_edit');
        Route::put('/update/{id}', 'ReturnController@update')->name('return_update');
        Route::delete('/{id}', 'ReturnController@destroy')->name('return_delete');
        Route::get('gen_devis/{id}', 'ReturnController@genQuotation')->name('return_quotation');
        Route::get('/status', 'ReturnController@updateStatus');
    });
    
    Route::group(['prefix' => 'invoice'], function() {
        Route::get('create/{type}/{id}', 'InvoiceController@create')->name('invoice_create');
        Route::get('action/{action}/{type}/{id}/{template}', 'InvoiceController@action')->name('invoice_action');
        Route::post('send/{id}', 'InvoiceController@sendEmail')->name('invoice_send');
    });
    
    Route::get('/testimonials', 'TestimonialController@list')->name('testimonial_list');
    Route::get('/testimonials/add', 'TestimonialController@pageCreate')->name('testimonial_page_add');
    Route::get('/testimonials/edit/{id}', 'TestimonialController@pageCreate')->name('testimonial_page_edit');
    Route::post('/testimonials', 'TestimonialController@create')->name('testimonial_create');
    Route::put('/testimonials', 'TestimonialController@update')->name('testimonial_action');

    Route::get('/settings', 'SettingController@index')->name('settings');
    Route::post('/settings', 'SettingController@store')->name('setting_create');

    Route::get('/settings/language', 'SettingController@pageLanguage')->name('settings_language');
    Route::get('/settings/translation', 'SettingController@pageTranslation')->name('settings_translation');
    
    // Newsletter Route
    Route::get('/subscriber', 'NewsletterController@newsletter')->name('admin.newsletter');
    Route::get('/mailsubscriber', 'NewsletterController@mailsubscriber')->name('admin.mailsubscriber');
    Route::post('/subscribers/sendmail', 'NewsletterController@subscsendmail')->name('admin.subscribers.sendmail');
    Route::get('/subscriber/add', 'NewsletterController@add')->name('admin.newsletter.add');
    Route::post('/subscriber/store', 'NewsletterController@store')->name('admin.newsletter.store');
    Route::post('/subscriber/delete/{id}/', 'NewsletterController@delete')->name('admin.newsletter.delete');
    Route::get('/subscriber/edit/{id}/', 'NewsletterController@edit')->name('admin.newsletter.edit');
    Route::post('/subscriber/update/{id}/', 'NewsletterController@update')->name('admin.newsletter.update');

    Route::resource('slides', 'SliderController');

    Route::get('/subscriber', 'NewsletterController@newsletter')->name('admin.newsletter');
    Route::get('/mailsubscriber', 'NewsletterController@mailsubscriber')->name('admin.mailsubscriber');
    Route::post('/subscribers/sendmail', 'NewsletterController@subscsendmail')->name('admin.subscribers.sendmail');
    Route::get('/subscriber/add', 'NewsletterController@add')->name('admin.newsletter.add');
    Route::post('/subscriber/store', 'NewsletterController@store')->name('admin.newsletter.store');
    Route::post('/subscriber/delete/{id}/', 'NewsletterController@delete')->name('admin.newsletter.delete');
    Route::get('/subscriber/edit/{id}/', 'NewsletterController@edit')->name('admin.newsletter.edit');
    Route::post('/subscriber/update/{id}/', 'NewsletterController@update')->name('admin.newsletter.update');

    Route::group(['prefix' => 'settings'],function(){
       
        Route::get('/profile', 'BackEndViewController@profile')->name('profile');
        Route::post('/updateProfile','ProfileController@updateProfileImageJs');
        Route::post('/update/user/profile','ProfileController@updateUserProfile')->name('update-profile');
        Route::post('/update/user/image','ProfileController@updateUserProfileImage')->name('update-profile-image');
        Route::post('/update/user/password','ProfileController@updateUserProfilePassword')->name('update-profile-password');

    Route::group(['prefix' => 'language'],function(){
        Route::get('/', 'LanguageController@pageLanguage')->name('language');
        Route::put('/status/{code}', 'LanguageController@updateStatus')->name('language_status');
        Route::put('/default', 'LanguageController@updateStatus')->name('language_default');      
    });

    });
});
       
