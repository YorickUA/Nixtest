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

Route::get('/contacts', function () {
  $contacts=Contact::all();
    return $contacts;
});
Route::get('/contacts/{id}', function ($id) {
  $contact=Contact::find($id);
    return $contact;
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
    return $contact;
});

Route::get('/edit/{id}', function ($id) {
  $contact=Contact::find($id);
  if($contact){
    return view('edit', compact('contact'));
  }else{
    return redirect('/');
  }
});

Route::put('/edit/{id}', function ($id, Request $data) {
  $contact=Contact::find($id);
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

  return $contact;
});

Route::delete('/edit/{id}', function ($id) {
  $result=Contact::find($id);
  $result->delete();
  return $result;
});
