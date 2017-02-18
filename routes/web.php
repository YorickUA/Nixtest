<?php
use App\Contact;
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
    return view('welcome');
});

// Route::get('/hi', function () {
//     return view('test');
// });
Route::get('/contacts', function () {
  $contacts=Contact::all();
    return $contacts;
});

Route::get('/contacts/{id}', function ($id) {
  $contact=Contact::find($id);
    return $contact;
});
