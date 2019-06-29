<?php

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
Auth::routes();
#####-------------- DashBoard (Auth login and isAdmin) ---------------#####
Route::group(['prefix' => 'dashboard' , 'middleware' => ['auth','auth.admin']], function() {

   Route::get('', 'Dashboard@index' )->name('admin.home');
   
   				###---_-- Users------###
   Route::get('users','AllUsers@index')->name('admin.Users');
   Route::get('users/status={regstatus}&uid={id}','AllUsers@UpdateStatus')->name('changeStatus');
   Route::get('users/role={role}&uid={id}','AllUsers@UpdateRole')->name('changeRole');
   Route::get('users/delete={id}','AllUsers@destroy')->name('DeleteUser');

   				###---_-- Comments------###
   Route::get('Comments','Comment@indexdashboard')->name('admin.comments');
   Route::get('Comments/delete={id}','Comment@destroy')->name('DeleteComment');
   
   				###---_-- Articles------###
   Route::get('Articles','Article@indexdashboard')->name('admin.articles');
   Route::get('Articles/status={regstatus}&ArtID={id}','Article@UpdateStatus')->name('change_Article_Status');
   Route::get('Articles/delete={id}','Article@destroy_dashboard')->name('Delete_Article_Admin');

   				###---_-- Categories------###
   Route::get('Categories','Category@indexdashboard')->name('admin.category');
   Route::get('Categories/delete={id}','Category@destroy')->name('DeleteCategory');

   				###---_-- Orders------###
	Route::get('orders','Book_Now@indexdashboard')->name('admin.orders');
	Route::get('orders/status={status}/id={id}','Book_Now@Update_Status_Orders')->name('change_Order_Status');
	Route::get('orders/delete={id}','Book_Now@destroy')->name('DeleteOrder');

   				###---_-- Medicines------###
	Route::get('medicine','Medicines@indexdashboard')->name('admin.medicine');
	Route::get('Medicine/delete={id}','Medicines@destroy')->name('DeleteMedicine');
	
   				###---_-- Pharmacies------###
	Route::get('pharmacies','Pharmacies@indexdahsboard')->name('admin.pharmacies');
	Route::get('pharmacy/delete={id}','Pharmacies@destroy')->name('DeletePharmacy');
	
   				###---_-- About-US------###
	Route::get('About-Us', 'HoemPages@DashboardAboutUSPage')->name('admin.aboutus');
	Route::post('About-Us/store','HoemPages@store')->name('Store_About_US');
	Route::get('About/delete={id}','HoemPages@destroy')->name('DeleteAbout');

});


	#####-------------- Front Web ---------------#####


Route::get('/', 'HoemPages@indexHomePage')->name('homepage');
##------------------about pages --------------------
Route::get('/about', 'HoemPages@indexAboutUSPage')->name('about');

##------------------Contact pages --------------------
Route::get('/contact', 'HoemPages@indexContactUSPage')->name('contact');
Route::post('/contact', 'HoemPages@SendMail')->name('SendMail');

##------------------ Pharmacies Page -------------##
Route::get('/Add_Your_Pharmacy','Pharmacies@index')->name('Add_Your_Pharmacy');
Route::post('/Add_Your_Pharmacy','Pharmacies@store')->name('Add_Your_Pharmacy');

##------------------ Medicines Page  -------------##
Route::get('/Add_Your_Medicine','Medicines@AddYourMedicine')->name('MedicineForm')->middleware('auth');
Route::post('/Add_Your_Medicine','Medicines@store_medicine')->name('Add_Your_Medicine');
Route::get('medicines', 'Medicines@indexMedicines')->name('medicines');
Route::post('/Add_Your_Category','Category@store_category')->name('Add_Your_Category');

##------------------ Medicine Filter  -------------##
Route::get('/medicines/{filter}', 'filter@Medicinefilter')->name('Medicinefilter');
Route::get('/Medicine_Search','filter@FormSearch');

##------------------ Medicine Filter  -------------##
Route::get('/Book_it_now/{id}', 'Book_Now@index')->name('BookNow')->middleware('auth');
Route::post('/Book_it_now', 'Book_Now@store')->name('StorOrder')->middleware('auth');

##---------- Articles (Health_info)  -------------##
Route::get('/HealthInformation','Article@index')->name('healthinfo');
Route::get('/HealthInformation/article={id}/CatId={cat_id}','Article@index_single_article')->name('single_article_info');

Route::get('/Article/Like={Like}/id={id}','Article@Like')->name('Article_Like');


		##---------- Group Articles & comment (Auth) -------------##
Route::group(['prefix' => 'Articles' , 'middleware' => 'auth'], function() {

	Route::get('Add_Your_Article', 'Article@AddYourArticle')->name('AddYourArticle');
	Route::post('Add_New_Article','Article@store')->name('Add_New_Article');
	Route::get('Edit_article={id}','Article@edit')->name('Edit_article');
	Route::post('Edit_Article/{id}','Article@update')->name('Update_Article');
	Route::get('delete={id}','Article@destroy')->name('Delete_Article');
		##---------- comment -------------##
	Route::post('Add_New_Comment','Article@Add_New_Comment')->name('Add_New_Comment');
});

// Route::get('/home', 'HomeController@index')->name('home');
