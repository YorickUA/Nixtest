<?php
use App\Contact;
use Illuminate\http\Request;
use \Illuminate\Database\QueryException;
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

Route::post('/contacts', function (Request $data) {

    $contact= new Contact;
    $contact->name=$data->name;
    $contact->surname=$data->surname;
    $contact->phone=$data->phone;
    $contact->birthday=$data->birthday;
    $contact->info=$data->info;
    try{
      $contact->save();
    } catch(QueryException $ex){
      return "false";
    }
    return;
});

Route::get('/edit/{id}', function ($id) {
  $contact=Contact::find($id);
    return view('edit', compact('contact'));
});
