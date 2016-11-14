<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {

    if( request('name') ){
	\App\Santa::create([
		'name' => request('name'),
		'email' => request('email')
	]);

	return 'Great! You are signed up, thanks!';
    }

    return view('welcome');
});

Route::get('signups',function(){
   return \App\Santa::all();
});

Route::get('partytime',function(){
  $randomSantas = \App\Santa::all()->shuffle();

  foreach( $randomSantas as $k => $s ){
	$count = $k+1;
	if( $count >= $randomSantas->count() ){ $count = 0; }
	echo $s->name . ' got ' . $randomSantas[$count]->name . ', <br/>';
  }

  echo 'Done!';

});
