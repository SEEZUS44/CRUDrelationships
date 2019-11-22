<?php

use App\User;
use App\Address;

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

//One to one relationship CRUD

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ins', function(){

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'456 PHP Road NY 1234']);
    //This needs to be set up in the address via fillable

    $user->address()->save($address);
    /*
    This line takes the created instance of the User
    Within User, access the address method (which stipulates User hasOne)
    now, save the address & make a connection.
    
    */
});

//His version
Route::get('/update', function(){
    
    $addy = Address::where('user_id', 1)->first();
    //the above reads where user_id = 1
    //first returns an object

    /*
    You can add another where clause to be a second condition

    His methods:
    $addy = Address::whereUser_id(1)->first(); 
    $addy = Address::whereUserId(1)->first();
    */

    $addy->name = "67776 Update Rd, Alaska";

    $addy->save();
});

//Below is a mini exercise to build one that actually takes values in
Route::get('/update/{id}', function($id){
    
    $addy = Address::where('id', $id)->first();
    //the above reads where user_id = 1
    //first returns an object

    /*
    You can add another where clause to be a second condition

    His methods:
    $addy = Address::whereUser_id(1)->first(); 
    $addy = Address::whereUserId(1)->first();
    */

    $addy->name = "67776 Update Rd, Alaska";

    $addy->save();
});

//READING & DELETING DATA

Route::get('/read', function () {

    $user = User::findOrFail(1);

    echo $user->address->name;
    //return is JSON
    //echo is basic html
});

Route::get('/del', function () {
    
    $user = User::findOrFail(1);

    $user->address()->delete();

    return "done";
});
