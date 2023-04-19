<?php

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use Core\Route;
use Core\View;

// Route::get("/",function(){
//     return 'Xin chao unicode Academy';
// });
// Route::get("/san-pham",function(){
//     return 'Danh sach san pham';
// });
// Route::post("/san-pham",function(){
//     return 'Them san pham';
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/bao-cao',[HomeController::class,'report']);
Route::get('/san-pham',[ProductController::class,'index']);
Route::get('/san-pham/edit/{id}/{slug}',[ProductController::class,'edit']);
Route::get('/flash-sale',function(){
    View::render('flash-sale/index',[]);
});
