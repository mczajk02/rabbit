<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Jobs\NotificationJob;
use App\Models\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    return ('Test przeszedł pomyślnie');
});


Route::get('/dispatch', function(){

    NotificationJob::dispatch()->onConnection('rabbitmq');

 return "dispatch";
});
// Route::get('/notifications', function(){

//     $not = Notification::all();

//  return response()->json($not);
// });

Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
Route::post('/notification/{notification}/done', [NotificationController::class, 'changeStatus'])->name('changeStatus');

