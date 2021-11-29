<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addCatogery;
use App\Http\Controllers\tagController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\frondEndController;
use App\Http\Controllers\userDashBoard;
use App\Http\Controllers\adminDashboard;
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
// practive
Route::get('kamran', function () {
    return view('bootsrtap.data');
});




// end practive




// frondend side
Route::get('about', [frondEndController::class, 'aboutDataDisplay']);
Route::get('contect', [frondEndController::class, 'contectDataDisplay']);

// contect us submit form
Route::POST('/message/Contect-form', [frondEndController::class, 'submitContectForm']);









Route::get('', [frondEndController::class, 'index']);
 Route::get('/home/blogDetails/{url}', [frondEndController::class, 'blogDetailsview']);


 Route::get('loginPage', function () {
    return view('authPages.login');
});

Route::get('registerPage', function () {
    return view('authPages.register');
});

Route::get('forgetPage', function () {
    return view('authPages.forget');
});







// admin side
Route:: group(['middleware' => 'auth'],function(){

// user Dashboard

Route::get('userDashboard', [userDashBoard::class, 'userDashboard']);
Route::get('userCreateBlogs', [userDashBoard::class, 'createBlogs']);
Route::post("userBlogCreate", [blogController::class, 'create']);
// Awaiting blogs for users
Route::get('awaitingUserBlogs', [userDashBoard::class, 'awaitingBlogs']);
Route::get("getUserAwaitingBlogs", [blogController::class, 'getBlogs']);
// Approved blogs for users
Route::get('approvedUserBlogs', [userDashBoard::class, 'approvedBlogsUser']);
Route::get("getUserApprovedBlogs", [blogController::class, 'getApprovedBlogs']);


// user dashboard profile update
Route::GET('userProfileUpdateForm', [userDashBoard::class, 'userProfileUpdateForm']);
Route::POST('userprofileUpdate', [userDashBoard::class, 'userprofileUpdate']);
// password update
Route::GET('userPasswordUpdae', [userDashBoard::class, 'userPasswordUpdae']);
Route::POST('userPasswordUpdate', [userDashBoard::class, 'userPasswordUpdate']);



Route::GET("/userDeleteBlogs/{id}", [blogController::class, 'deleteBlogs']);

// edit Blogs for user
Route::get('userBlogBladeView/{id}', [userDashBoard::class, 'userBlogBladeView']);






Route:: group(['middleware' => 'checkRole'],function(){


// admin dashboard
Route::get('dashboard', [userDashBoard::class, 'adminDashboard']);
    // cms (about,contect,footer)
Route::get('cms', [frondEndController::class, 'cms']);
Route::POST('aboutCmsInsertOrUpdate', [frondEndController::class, 'aboutCmsInsertOrUpdate']);
Route::POST('contectCmsInsertOrUpdate', [frondEndController::class, 'contectCmsInsertOrUpdate']);    
Route::POST('footerCmsInsertOrUpdate', [frondEndController::class, 'footerCmsInsertOrUpdate']);


// show user contact form message on admin side
Route::GET('userMessage', [frondEndController::class, 'showUserMessage']);
Route::GET('getAllMessage', [frondEndController::class, 'getAllMessage']);
Route::GET('viewContactMessageDetail/{id}', [frondEndController::class, 'viewContactMessageDetail']);
Route::GET('deleteMsg/{id}', [frondEndController::class, 'deleteMsg']);



// view all user on admin dashboard

Route::get('viewAllUsers',[adminDashboard::class,'viewAllUsers']);
Route::get('getAllUsersAdmin',[adminDashboard::class,'getAllUsersAdmin']);
Route::get('deleteUsersAdmin/{id}',[adminDashboard::class,'deleteUsersAdmin']);

// category crud operation
Route::get("categries", [addCatogery::class, 'index']);
Route::post("addCategory", [addCatogery::class, 'create']);
Route::GET("getAllCategories", [addCatogery::class, 'getAllCategories']);
Route::GET("getCategory/{id}", [addCatogery::class, 'getCategory']);
Route::POST("updateCategory", [addCatogery::class, 'updateCategory']);
Route::get("deleteCategory/{id}", [addCatogery::class, 'deleteCategory']);


// tag crud operation
Route::get("tag", [tagController::class, 'index']);
Route::post("addTag", [tagController::class, 'create']);
Route::GET("getAllTag", [tagController::class, 'getAllTags']);
Route::GET("getTag/{id}", [tagController::class, 'getTags']);
Route::POST("updateTag", [tagController::class, 'updateTags']);
Route::get("deleteTag/{id}", [tagController::class, 'deleteTags']);

// blogs crud opetation
Route::get("blog", [blogController::class, 'index']);
Route::get("creatBlog", [blogController::class, 'createBlog']);
Route::post("blogCreate", [blogController::class, 'create']);
Route::post("getAllBlogs", [blogController::class, 'getAllBlogs']);
Route::GET("/editBlog/{id}", [blogController::class, 'editBlogViews']);

Route::GET("deleteBlogs/{id}", [blogController::class, 'deleteBlogs']);


// admin profile update
Route::GET('profileUpdateForm', [adminDashboard::class, 'profileUpdateForm']);
Route::POST('profileUpdate', [adminDashboard::class, 'profileUpdate']);
// password update
Route::GET('passwordUpdae', [adminDashboard::class, 'passwordUpdateForm']);
Route::POST('passwordUpdate', [adminDashboard::class, 'passwordUpdate']);


// awaiting approval blogs list for admin

Route::GET("awaitingBlogs", [blogController::class, 'awaitingBlogs']);
Route::POST("getAwaitingBlogs", [blogController::class, 'getAwaitingApprovalBlogs']);
});
});


Auth::routes(['verify' => true ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
