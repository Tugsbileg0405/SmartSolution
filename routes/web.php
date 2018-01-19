<?php

Route::resource('/', 'AppController', ['except' => [
    'create', 'store', 'update', 'destroy', 'edit', 'show'
]]);
Route::resource('/about', 'AboutController', ['except' => [
    'create', 'store', 'update', 'destroy', 'edit', 'show'
]]);
Route::resource('/contact', 'ContactController', ['except' => [
    'create', 'update', 'destroy', 'edit', 'show'
]]);
Route::resource('/solution', 'SolutionController', ['except' => [
    'create', 'store', 'update', 'destroy', 'edit'
]]);
Route::resource('/products', 'ProductController', ['except' => [
    'create', 'store', 'update', 'destroy', 'edit'
]]);

Route::resource('/brand', 'BrandController', ['except' => [
    'create', 'store', 'update', 'destroy', 'edit'
]]);

Route::post('subscribe', 'AppController@subscribe');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/mail', 'AdminController@mail');
    Route::post('/mail', 'AdminController@sendmail');
    Route::get('/addcategory', 'AdminCategoryController@addcategory');
    Route::resource('/category', 'AdminCategoryController');
    Route::get('/getcategory', 'AdminCategoryController@getCats')->name('datatables.getcats');
    Route::get('/addbrand', 'AdminBrandController@addbrand');
    Route::resource('/contact', 'AdminContactController');
    Route::get('/getcontacts', 'AdminContactController@getContacts')->name('datatables.getcontacts');
    Route::resource('/brand', 'AdminBrandController');
    Route::get('/getbrand', 'AdminBrandController@getBrands')->name('datatables.getbrands');
    Route::resource('/faq', 'FAQController');
    Route::get('/addfaq', 'FAQController@addfaq');
    Route::get('/getfaqs', 'FAQController@getFaqs')->name('datatables.getFaqs');
    Route::get('/addproduct', 'AdminProductController@addproduct');
    Route::post('/photo/create', 'AdminProductController@photoupload');
    Route::post('/photo/destroy', 'AdminProductController@photodestroy');
    Route::resource('/product', 'AdminProductController');
    Route::get('/getproducts', 'AdminProductController@getProducts')->name('datatables.getproducts');
});
