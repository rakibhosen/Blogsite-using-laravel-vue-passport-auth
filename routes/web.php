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

Route::get('/', function () {
    return view('public.index');
});


Auth::routes();
Route::get('/authuserprofile', 'userProfileController@userProfile')->name('user.profile');
Route::post('/userloggin', 'AuthController@Login');
Route::post('/registerUser', 'AuthController@Register');

// Route::get('/admin/dashboard','Backend\AdminController@index')->name('admin.dashboard');
Route::get('/adminlogin','Backend\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('adminlogin','Backend\Auth\LoginController@login');
Route::post('admin/logout','Backend\Auth\LoginController@logout')->name('admin.logout');
Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

//public route
Route::get('/getabout', 'BlogPostController@get_about');
Route::get('/userinfo', 'userProfileController@AuthUser');
Route::post('/addletter', 'BlogPostController@AddLetter');
Route::get('/blog', 'BlogPostController@BlogPost')->name('blog');
Route::get('/sidebarblogpost', 'BlogPostController@SidebarBlogPost');
Route::get('/blog/{id}', 'BlogPostController@SingleBlog');
Route::get('/categories', 'BlogPostController@getCategories');
Route::get('/categorypost/{id}', 'BlogPostController@getPostById');
Route::get('/search', 'BlogPostController@RealSearch');
Route::post('/userMessage', 'BlogPostController@UserMessage');
// comment post route
Route::post('/addcomment', 'CommentController@addComment');
Route::get('/postcomment/{id}', 'CommentController@allComments');


Route::get('/admin', 'HomeController@index')->name('admin.dashboard');
// Route::get('/admin', 'HomeController@index')->name('home');

// axios category route
Route::post('/add-category', 'CategoryController@store');
Route::get('/category', 'CategoryController@get_category');
Route::get('/category/{id}', 'CategoryController@deleteCategory');
Route::get('/editcategory/{id}', 'CategoryController@editCategory');
Route::post('/editcategory/{id}', 'CategoryController@updateCategory');
Route::get('/allsubscribe', 'CategoryController@All_letter');
Route::get('/deleteLetter/{id}', 'CategoryController@Delete_Letter');
Route::post('/add-about', 'CategoryController@add_about');
Route::get('/about-list', 'CategoryController@about_list');
Route::get('/about-delete/{id}', 'CategoryController@about_delete');

// axios category route allsubscribe

Route::post('/add-post', 'PostController@store');
Route::get('/post', 'PostController@get_post');
Route::get('/users', 'PostController@AllUsers');
Route::get('/users/{id}', 'PostController@DeleteUser');
Route::get('/post/{id}', 'PostController@deletePost');
Route::get('/editpost/{id}', 'PostController@editPost');
Route::post('/editpost/{id}', 'PostController@updatePost');

// vue routes


Route::get('admin/{anypath}','HomeController@index')->where('path','.*');
Route::get('admin/{anypath}/{id}','HomeController@index')->where('path','.*');
Route::get('/{anypath}','BlogPostController@index')->where('path','.*');
Route::get('/{anypath}/{id}','BlogPostController@index')->where('path','.*');

