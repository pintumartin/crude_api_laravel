<?php


//use App\Http\Controllers\Democontroller;
//use App\Http\Controllers\Singleactioncontroller;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employeecontroller;
use Illuminate\Http\Request;
 use App\Http\Controllers\Registrationcontroller;
//use App\models\Customer;
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
Route::get('/view', [EmployeeController::class, 'index']);
Route::post('file-upload', [EmployeeController::class, 'fileUpload']);
Route::get('get-all-session', function () {
    $session = session()->all();
    print_r($session);
});
Route::get('set-session',function(Request $request){
    $request->session()->put('username','martin');
    $request->session()->put('user_id','101');
    return redirect('get-all-session'); 
});
Route::get('destroy-session',function(){
    session()->forget(['username','user_id']);
    // session()->forget('user_id');
    return redirect('get-all-session'); 
});
 Route::get('/',function(){
             return view('index');
});
Route::get('/register',[Registrationcontroller::class,'index']); 
Route::get('/register/login',[Registrationcontroller::class,'index2']); 
Route::get('/register/home',[Registrationcontroller::class,'index3']); 
Route::get('/register/view',[Registrationcontroller::class,'view']);  
Route::get('/register/delete/{id}',[Registrationcontroller::class,'delete'])->name('customer.delete');  
Route::get('/register/edit/{id}',[Registrationcontroller::class,'edit'])->name('customer.edit');  
Route::post('/register/update/{id}',[Registrationcontroller::class,'update'])->name('customer.update');  
Route::post('/register',[Registrationcontroller::class,'register'])->name('customer.create');
Route::post('/login',[Registrationcontroller::class,'login']);
Route::post('/logout',[Registrationcontroller::class,'logout'])->name('customer.logout');
Route::get('/logout',[Registrationcontroller::class,'logout']);

//Route::resource('/photo', Photocontroller::class);  
//Route::get('/customer',[Customercontroller::class,'index']);  

