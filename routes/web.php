<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Boats\AdminBoatsComponent;

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

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::get('clear-translations', 'ClearCacheController@clear_translations')
        ->name('clear-translations');
        
    Route::get('clean', 'ClearCacheController@clear_cache')
        ->name('clear-cache');

    Route::post('/upload-image', 'ImageController@upload')->name('upload_image');
    Route::post('/uploadImage', 'Controller@uploadImages');

  // User Notification
  Route::get('/user/notf/show', 'NotificationController@user_notf_show')->name('user-notf-show');
  Route::get('/user/notf/count','NotificationController@user_notf_count')->name('user-notf-count');
  Route::get('/user/notf/clear','NotificationController@user_notf_clear')->name('user-notf-clear');
  // User Notification Ends

  // booking Notification
  Route::get('/booking/notf/show', 'NotificationController@booking_notf_show')->name('booking-notf-show');
  Route::get('/booking/notf/count','NotificationController@booking_notf_count')->name('booking-notf-count');
  Route::get('/booking/notf/clear','NotificationController@booking_notf_clear')->name('booking-notf-clear');
  // booking Notification Ends


Route::get('/logout','Auth\LoginController@logout')->name('user.logout');

Route::post('/custom-sign-in','UserController@signIn');
Route::post('/custom-sign-up','UserController@signUp');
Route::post('/wishlist', 'UserController@addWishlist')->name('add_wishlist')->middleware('auth');
Route::delete('/wishlist', 'UserController@removeWishlist')->name('remove_wishlist')->middleware('auth');
Route::get('/user/wishlist', 'UserController@pageWishList')->name('user_wishlist')->middleware('auth');

Route::get('/get-logged-in-user',function(){
    return App\Models\User::findOrFail(auth()->user()->id)
        ->first();
});


Route::group([
              'namespace' => 'Frontend', 
              'middleware' => []], function(){
                  
        Route::get('/', 'ViewController@home');
        Route::get('/home', 'ViewController@home')->name('home');                
        Route::get('/languague/{locale}', 'ViewController@changeLanguage')->name('change_language');
        Route::get('/search', 'ViewController@search')->name('search');
        Route::get('/terms-and-conditions', 'ViewController@termsConditions')->name('page_terms_conditions');
        Route::get('/sale-conditions', 'ViewController@saleConditions')->name('page_sale_conditions');
        Route::get('/blog/all', 'PostController@list')->name('post_list_all');
        Route::post('/post', 'PostController@send')->name('send');
        Route::get('/blog/{cat_slug}', 'PostController@list')->where('cat_slug', '[a-zA-Z0-9-_]+')->name('post_list');
        Route::get('{slug}-{id}', 'PostController@detail')
        ->where('slug', '[a-zA-Z0-9-_]+')
        ->where('id', '[0-9]+')->name('post_detail');
        Route::get('/ajax-search', 'ViewController@ajaxSearch');
        Route::get('/ajax-search-listing', 'ViewController@searchListing');
        Route::get('/search', 'ViewController@search')->name('search');
        Route::post('/home-booking', 'ViewController@booking')->name('home_booking');
        Route::get('/contact', 'ViewController@contact')->name('contact_page');
        Route::get('/about-us', 'ViewController@about')->name('about_page');
        Route::post('/contact/send', 'ViewController@sendContact')->name('contact_send');

         Route::get('/changecurrency/{currId}', 'ViewController@changeCurrency')->name('changeCurrency');


        Route::get('/search-listing-input', 'ViewController@searchListing')->name('search_listing');
        Route::get('/search-listing', 'ViewController@pageSearchListing')->name('page_search_listing');
        
        // Route::get('/meilleures-offres', 'PlaceController@list')->name('best_offers');
        // Route::get('/offre-special/{slug}', 'PlaceController@detail')->name('place_detail');
        // Route::get('/offres/filter', 'PlaceController@getListFilter')->name('place_get_list_filter');

        Route::get('/offers', 'OfferController@list')->name('offer.index');
        Route::get('/offers/{slug}', 'OfferController@show')->name('offer.show');
        
        Route::get('/cities', 'CityController@list')->name('cities_list');
        Route::get('/city/{slug}', 'CityController@detail')->name('city_detail');
        Route::get('/city/{slug}/{cat_slug}', 'CityController@detail')->name('city_category_detail');

        Route::get('/categorie', 'CategoryController@listPlace')->name('category_list');
        Route::get('/categorie/{slug}', 'CategoryController@detail')->name('category_detail');
        Route::get('/categorie/type/{slug}', 'CategoryController@typeDetail')->name('category_type_detail');
        Route::get('/categories', 'CategoryController@search')->name('category_search');
        Route::post('/reviews', 'ReviewController@create')->name('review_create')->middleware('auth');
       
        Route::get('/offer/map', 'PlaceController@getListMap')->name('place_get_list_map');
        Route::get('/cities/{country_id}', 'CityController@getListByCountry')->name('city_get_list');
        Route::get('/cities-search', 'CityController@search')->name('city_search');

        Route::get('/cart', 'BookingController@cart')->name('booking_cart');

        //Route::get('/checkout', 'CheckoutController@show')->name('checkout_show');
        Route::post('/checkout', 'CheckoutController@store')->name('checkout_store');

        Route::get('/add-to-cart/{id}', 'BookingController@addToCart')->name('add-to-cart');
        Route::put('/update-cart', 'BookingController@update');
        Route::delete('/remove-from-cart', 'BookingController@remove')->name('remove-from-cart');

        Route::post('/bookings/signin', 'BookingController@signInUser')->name('booking_user_signin');
        Route::post('/bookings/register', 'BookingController@createUser')->name('booking_user_register');
        Route::post('/bookings', 'BookingController@booking')->name('booking_submit');

     });



Auth::routes();

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';