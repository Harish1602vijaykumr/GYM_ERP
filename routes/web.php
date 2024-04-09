<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/logout',[App\Http\Controllers\HomeController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('home');

Route::get('/dashboard',[App\Http\Controllers\AdminController::class, 'dashboard']);
Route::get('/addplan',[App\Http\Controllers\AdminController::class, 'addplan']);
Route::post('/storeplan',[App\Http\Controllers\AdminController::class, 'storeplan']);
Route::get('/listplan', [App\Http\Controllers\AdminController::class, 'listplan']);
Route::get('/editplan/{id}',[App\Http\Controllers\AdminController::class, 'editplan']);
Route::post('/storeplanedit',[App\Http\Controllers\AdminController::class, 'storeplanedit']);
Route::get('/deleteplan/{id}',[App\Http\Controllers\AdminController::class, 'deleteplan']);
Route::get('/plan/{id}/{status}', [App\Http\Controllers\AdminController::class, 'planStatus']);

Route::get('/feesentry',[App\Http\Controllers\AdminController::class, 'feesentry']);
Route::post('/storefeesentry',[App\Http\Controllers\AdminController::class, 'storefeesentry']);
Route::get('deletefees/{id}',[App\Http\Controllers\AdminController::class,'deletefees']);
Route::get('/listfees',[App\Http\Controllers\AdminController::class,'listfees']);
Route::get('/editfees/{id}',[App\Http\Controllers\AdminController::class, 'editfees']);
Route::post('/storefeesedit',[App\Http\Controllers\AdminController::class, 'storefeesedit']);
Route::get('/fees/{id}/{status}', [App\Http\Controllers\AdminController::class, 'feesStatus']);
Route::get('/check_mobile/{mobileno}',[App\Http\Controllers\AdminController::class,'checkMobile']);

Route::get('/workout',[App\Http\Controllers\AdminController::class,'workout']);
Route::post('/storeworkout',[App\Http\Controllers\AdminController::class,'storeworkout']);
Route::get('/listworkout',[App\Http\Controllers\AdminController::class,'listworkout']);
Route::get('/editworkout/{id}',[App\Http\Controllers\AdminController::class, 'editworkout']);
Route::post('/storeworkoutedit',[App\Http\Controllers\AdminController::class, 'storeworkoutedit']);
Route::get('/deleteworkout/{id}',[App\Http\Controllers\AdminController::class, 'deleteworkout']);
Route::get('/workoutStatus/{id}/{status}', [App\Http\Controllers\AdminController::class, 'workoutStatus']);

Route::get('/bodyshape',[App\Http\Controllers\AdminController::class, 'bodyshape']);
Route::post('storebodyshape',[App\Http\Controllers\AdminController::class, 'storebodyshape']);
Route::get('/listbodyshape',[App\Http\Controllers\AdminController::class,'listbodyshape']);
Route::get('/editbodyshape/{id}',[App\Http\Controllers\AdminController::class, 'editbodyshape']);
Route::post('/storebodyshapeedit',[App\Http\Controllers\AdminController::class, 'storebodyshapeedit']);
Route::get('/deletebodyshape/{id}',[App\Http\Controllers\AdminController::class, 'deletebodyshape']);
Route::get('/bodyshapeStatus/{id}/{status}', [App\Http\Controllers\AdminController::class, 'bodyshapeStatus']);

Route::get('/entry',[App\Http\Controllers\AdminController::class, 'entry']);
Route::post('/storeentry',[App\Http\Controllers\AdminController::class, 'storeentry']);
Route::get('/listentry',[App\Http\Controllers\AdminController::class, 'listentry']);
Route::get('/editentry/{id}',[App\Http\Controllers\AdminController::class, 'editentry']);
Route::post('/storeentryedit',[App\Http\Controllers\AdminController::class, 'storeentryedit']);
Route::get('/deleteentry/{id}',[App\Http\Controllers\AdminController::class, 'deleteentry']);
Route::get('/entry/{id}/{status}', [App\Http\Controllers\AdminController::class, 'entryStatus']);

Route::get('/memberslist',[App\Http\Controllers\MembersController::class,'memberslist']);
Route::get('/membersRegistration',[App\Http\Controllers\MembersController::class,'membersRegistration']);
Route::post('/storeMembers',[App\Http\Controllers\MembersController::class,'storeMembers']);
Route::get('/edit_member/{id}',[App\Http\Controllers\MembersController::class,'editmember']);
Route::post('/storememberedit',[App\Http\Controllers\MembersController::class,'storememberedit']);
Route::get('/deletemember/{id}',[App\Http\Controllers\MembersController::class,'deletemember']);
Route::get('/changeStatus/{id}/{status}', [App\Http\Controllers\MembersController::class, 'changeStatus']);
Route::get('/checkmobile/{mobile}',[App\Http\Controllers\MembersController::class,'checkmobile']);

Route::get('/enquiry',[App\Http\Controllers\AdminController::class, 'enquiry']);
Route::post('/storeenquiry',[App\Http\Controllers\AdminController::class, 'storeenquiry']);
Route::get('/listenquiry',[App\Http\Controllers\AdminController::class, 'listenquiry']);
Route::get('/editenquiry/{id}',[App\Http\Controllers\AdminController::class, 'editenquiry']);
Route::post('/storeenquiryedit',[App\Http\Controllers\AdminController::class, 'storeenquiryedit']);
Route::get('/deleteenquiry/{id}',[App\Http\Controllers\AdminController::class, 'deleteenquiry']);
Route::get('/enquiry/{id}/{status}', [App\Http\Controllers\AdminController::class, 'enquiryStatus']);