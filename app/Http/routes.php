<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Task;
use App\Role;
use App\Testcase;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::get('/', function () {
    	return view('welcome');
	})->middleware('guest');

Route::group(['middleware' => ['web']], function () {


	Route::get('/home', function (Request $request) {
		return view('home');
	})->middleware('auth');

	Route::get('/tasks', 'TaskController@index');
	Route::post('/task', 'TaskController@store');
	Route::delete('/task/{task}', 'TaskController@destroy');


	Route::get('/testcases', 'TestcaseController@index');
	Route::group(['prefix' => '/testcase'], function()  {
		Route::get('/new', 'TestcaseController@create');	
		Route::post('/new', 'TestcaseController@store');
		Route::get('/{id}', 'TestcaseController@edit');
		Route::put('/{id}', 'TestcaseController@update');
		Route::get('/show/{id}', 'TestcaseController@show');
		Route::delete('/{id}', 'TestcaseController@destroy');
	});
		
	Route::get('/testplans', 'TestplanController@index');
	Route::group(['prefix' => '/testplans'], function (){
		Route::get('/create', 'TestplanController@create');
		Route::post('/create', 'TestplanController@store');
		Route::get('/info/{id}', 'TestplanController@show');
		Route::get('/edit/{id}', 'TestplanController@edit');
		Route::put('/edit/{id}', 'TestplanController@update');
		Route::delete('/{plan_id}/delete/{case_id}', 'TestplanController@delete_case');
		Route::post('/{id}/add/testcases', 'TestplanController@add_testcases');
		Route::delete('/delete/{id}', 'TestplanController@destroy');
		
	});

	Route::group(['prefix' => '/runs'], function (){
		Route::get('/', 'TestController@index');
		Route::get('/view/{id}', 'TestController@view');
		Route::get('/ajax/demo', 'TestController@show_case');
		Route::get('/add/comment', 'TestController@addComment');
		Route::get('/add/result', 'TestController@addResult');
	});

	Route::get('test/{id}', function($id){

		$testcase = Testcase::findOrFail($id);
		$comment = new App\Comment([
			'comment' => 'testing',
			'user_id' => '1',
		]);

		$testcase->comments()->save($comment);
	});


	Route::auth();

});
