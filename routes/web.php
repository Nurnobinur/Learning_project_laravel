<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessionController;
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

route::get("/",[AdminController::class,"index"]);

route::get("login",[AuthController::class,"login_form"])->name("login");
route::post("login",[AuthController::class,"login"])->name("login");
route::get("logout",[AuthController::class,"logout"]);

route::get("admin",[AdminController::class,"index"])->name("dashbord");
route::resource("categorise",CategoriseController::class)->except(["show"]);
route::resource("courses",CourseController::class);
route::resource("lessions",LessionController::class);

// route::middleware("auth")->group(function(){
//     // route::get("admin",[AdminController::class,"index"])->name("dashbord");



// });



